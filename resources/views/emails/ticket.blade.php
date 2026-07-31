<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>E-Ticket AmikomEventHub</title>
</head>

<body style="margin:0;padding:0;background:#f4f6fb;font-family:Arial,Helvetica,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f6fb;padding:40px 0;">
<tr>
<td align="center">

<table width="600" cellpadding="0" cellspacing="0"
style="background:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 8px 24px rgba(0,0,0,.08);">

    <!-- Header -->
    <tr>
        <td align="center"
            style="background:linear-gradient(135deg,#4f46e5,#312e81);padding:35px;color:white;">

            <h1 style="margin:0;font-size:30px;">
                🎟️ AmikomEventHub
            </h1>

            <p style="margin-top:10px;font-size:16px;">
                E-Ticket Confirmation
            </p>

        </td>
    </tr>

    <!-- Body -->
    <tr>
        <td style="padding:35px;">

            <h2 style="margin-top:0;color:#111827;">
                Hai, {{ $transaction->customer_name }} 👋
            </h2>

            <p style="color:#4b5563;font-size:16px;line-height:26px;">
                Terima kasih telah melakukan pembelian tiket di
                <strong>AmikomEventHub</strong>.
                Pembayaran kamu telah berhasil dan e-ticket telah diterbitkan.
            </p>

            <table width="100%" cellpadding="10"
                style="margin-top:25px;background:#f8fafc;border-radius:12px;">

                <tr>
                    <td><strong>🎫 Event</strong></td>
                    <td>{{ $transaction->event->title }}</td>
                </tr>

                <tr>
                    <td><strong>📄 Order ID</strong></td>
                    <td>{{ $transaction->order_id }}</td>
                </tr>

                <tr>
                    <td><strong>💳 Status</strong></td>
                    <td style="color:#16a34a;font-weight:bold;">
                        {{ strtoupper($transaction->status) }}
                    </td>
                </tr>

                <tr>
                    <td><strong>💰 Total</strong></td>
                    <td>
                        Rp {{ number_format($transaction->total_price,0,',','.') }}
                    </td>
                </tr>

            </table>

            <div style="text-align:center;margin-top:35px;">

                <a href="{{ route('ticket',$transaction) }}"
                    style="
                    background:#4f46e5;
                    color:white;
                    padding:15px 35px;
                    text-decoration:none;
                    border-radius:10px;
                    font-weight:bold;
                    display:inline-block;">
                    🎟️ Lihat E-Ticket
                </a>

            </div>

        </td>
    </tr>

    <!-- Footer -->
    <tr>
        <td align="center"
            style="background:#f9fafb;padding:25px;color:#6b7280;font-size:13px;">

            Email ini dikirim secara otomatis oleh
            <strong>AmikomEventHub</strong>.

            <br><br>

            © {{ date('Y') }} AmikomEventHub.
            All Rights Reserved.

        </td>
    </tr>

</table>

</td>
</tr>
</table>

</body>
</html>