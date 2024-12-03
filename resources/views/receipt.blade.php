<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .receipt-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            font-size: 14px;
            margin: 0;
        }
        .info {
            margin-bottom: 20px;
        }
        .info p {
            margin: 5px 0;
        }
        .items-table {
            width: 100%;
            border-collapse: collapse;
        }
        .items-table th, .items-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .items-table th {
            background-color: #f4f4f4;
        }
        .total {
            margin-top: 20px;
            text-align: right;
        }
        .total h3 {
            margin: 0;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <div class="header">
            <h1>Geove</h1>
            <p>Your trusted footwear shop</p>
        </div>

        <div class="info">
            <p><strong>Customer Name:</strong> {{ $order->user->name }}</p>
            <p><strong>Order ID:</strong> {{ $order->id }}</p>
            <p><strong>Date:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
        </div>

        <table class="items-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 2) }}</td>
                    <td>{{ number_format($item->price * $item->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total">
            <h3>Total: Rp.{{ number_format($order->total_price, 2) }}</h3>
        </div>

        <div class="footer">
            <p>Thank you for shopping with us!</p>
            <p>Visit us at www.geove.com</p>
        </div>
    </div>
</body>
</html>
