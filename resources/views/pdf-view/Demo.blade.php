<html lang="en">
<head>
    <title>Invoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white-100 p-10">
<div class="bg-white border-2 h-full border-gray-400">
    <div class="p-6">
        <h1 class="text-2xl font-bold text-gray-800">Invoice</h1>
        <div class="flex justify-between mt-4">
            <div>
                <h2 class="text-lg font-semibold">From:</h2>
                <p>Your Company Name</p>
                <p>123 Your Street</p>
                <p>Your City, ST 12345</p>
                <p>Email: your@email.com</p>
            </div>
            <div>
                <h2 class="text-lg font-semibold">To:</h2>
                <p>Client Name</p>
                <p>456 Client Street</p>
                <p>Client City, ST 67890</p>
                <p>Email: client@email.com</p>
            </div>
        </div>
        <div class="mt-6">
            <table class="min-w-full border-collapse border border-gray-300">
                <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">Item</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Description</th>
                    <th class="border border-gray-300 px-4 py-2 text-right">Unit Price</th>
                    <th class="border border-gray-300 px-4 py-2 text-right">Quantity</th>
                    <th class="border border-gray-300 px-4 py-2 text-right">Total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="border border-gray-300 px-4 py-2">Product 1</td>
                    <td class="border border-gray-300 px-4 py-2">Description of Product 1</td>
                    <td class="border border-gray-300 px-4 py-2 text-right">$10.00</td>
                    <td class="border border-gray-300 px-4 py-2 text-right">2</td>
                    <td class="border border-gray-300 px-4 py-2 text-right">$20.00</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 px-4 py-2">Product 2</td>
                    <td class="border border-gray-300 px-4 py-2">Description of Product 2</td>
                    <td class="border border-gray-300 px-4 py-2 text-right">$15.00</td>
                    <td class="border border-gray-300 px-4 py-2 text-right">1</td>
                    <td class="border border-gray-300 px-4 py-2 text-right">$15.00</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="4" class="border border-gray-300 px-4 py-2 text-right font-bold">Subtotal</td>
                    <td class="border border-gray-300 px-4 py-2 text-right">$35.00</td>
                </tr>
                <tr>
                    <td colspan="4" class="border border-gray-300 px-4 py-2 text-right font-bold">Tax (10%)</td>
                    <td class="border border-gray-300 px-4 py-2 text-right">$3.50</td>
                </tr>
                <tr>
                    <td colspan="4" class="border border-gray-300 px-4 py-2 text-right font-bold">Total</td>
                    <td class="border border-gray-300 px-4 py-2 text-right">$38.50</td>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="mt-6">
            <p class="text-gray-600">Thank you for your business!</p>
        </div>
    </div>
</div>

</body>
</html>
