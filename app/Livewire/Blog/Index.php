<?php

namespace App\Livewire\Blog;

use Aaran\Blog\Models\Post;
use App\Livewire\Trait\CommonTraitNew;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use CommonTraitNew;
    use WithFileUploads;

    #region[properties]

    public string $body;
    public $users;
    public $image;
    public $old_image;
    public mixed $firstPost='';
    #endregion

    public function Mount()
    {
        $this->firstPost = Post::where('id','=','1')->firstOrFail();
//        dd($this->firstPost);
    }

    #region[Get-Save]
    public function getSave(): void
    {
        if ($this->common->vname != '') {
            if ($this->common->vid == '') {
                $Post = new Post();
                $extraFields = [
                    'body' => $this->body,
                    'image' => $this->saveImage(),
                    'user_id' => auth()->id(),
                ];
                $this->common->save($Post, $extraFields);
                $message = "Saved";
            } else {
                $Post = Post::find($this->common->vid);
                $extraFields = [
                    'body' => $this->body,
                    'image' => $this->saveImage(),
                    'user_id' => auth()->id(),
                ];
                $this->common->edit($Post, $extraFields);
                $message = "Updated";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
    }
    #endregion

    #region[Get-Obj]
    public function getObj($id)
    {
        if ($id) {
            $Post = Post::find($id);
            $this->common->vid = $Post->id;
            $this->common->vname = $Post->vname;
            $this->common->body = $Post->body;
            $this->common->active_id = $Post->active_id;
            $this->old_image = $Post->image;
            return $Post;
        }
        return null;
    }
    #endregion


    #region[Clear-Fields]
    public function clearFields(): void
    {
        $this->common->vid = '';
        $this->common->vname = '';
        $this->common->active_id = '1';
        $this->body = '';
        $this->old_image = '';
        $this->image = '';
    }
    #endregion

    #region[Image]
    public function saveImage()
    {
        if ($this->image) {

            $image = $this->image;
            $filename = $this->image->getClientOriginalName();

            if (Storage::disk('public')->exists(Storage::path('public/images/' . $this->old_image))) {
                Storage::disk('public')->delete(Storage::path('public/images/' . $this->old_image));
            }

            $image->storeAs('public/images', $filename);

            return $filename;

        } else {
            if ($this->old_image) {
                return $this->old_image;
            } else {
                return 'no image';
            }
        }
    }
    #endregion



    #region[Render]
    public function getRoute()
    {
        return route('posts');
    }
    public function render()
    {
        return view('livewire.blog.index')->with([
            'list' => $this ->getListForm ->getList(Post::class),
        ]);
    }
    #endregion
}
