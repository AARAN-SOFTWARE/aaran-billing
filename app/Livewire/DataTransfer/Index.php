<?php

namespace App\Livewire\DataTransfer;

use Aaran\Common\Models\Common;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public function getCommon(): void
    {
        // Define the mappings of tables to their respective label IDs
        $tableMappings = [
            'cities' => 2,
            'states' => 3,
            'pincodes' => 4,
            'countries' => 5,
            'hsncodes' => 6,
            'colours' => 7,
            'sizes' => 8,
            'banks' => 9,
            'ledgers' => 10,
            'transports' => 11,
            'departments' => 12,
            'receipttypes' => 14,
            'categories' => 18,
        ];

        // Loop through each table mapping
        foreach ($tableMappings as $tableName => $labelId) {
            // Fetch old records from the destination database
            $oldRecords = DB::connection('destination')->table($tableName)->get();
            // Insert records into commons if they don't exist
            foreach ($oldRecords as $oldRecord) {
                $this->insertIfNotExists($oldRecord->vname, $labelId, $oldRecord->active_id);
            }
        }

        $this->dispatch('notify', ...['type' => 'success', 'content' => 'Common Migrated Successfully']);
    }


    private function insertIfNotExists(string $vname, int $labelId, ?int $activeId): void
    {
        // Check if the vname exists in commons
        $exists = DB::table('commons')->where('vname', $vname)->first();

        // If it does not exist, insert it
        if (!$exists) {
            Common::create([
                'label_id' => $labelId,
                'vname' => $vname,
                'desc' => '-',
                'desc_1' => '1',
                'active_id' => $activeId,
            ]);
        }
    }

    public function migrateData():void
    {

        $this->getCommon();
    }
    public function render()
    {
        return view('livewire.data-transfer.index');
    }
}
