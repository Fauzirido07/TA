<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Reset Password</title>
</head>
<body style="font-family:system-ui,-apple-system,Segoe UI,Roboto,'Helvetica Neue',Arial; background:#f6f8fb; margin:0; padding:0;">
  <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
      <td align="center" style="padding:32px 16px;">
        <table width="600" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 6px 18px rgba(15,23,42,0.06);">
          <tr>
            <td style="padding:28px 32px;">
              <h2 style="margin:0 0 8px; font-size:20px; color:#0f172a;">Permintaan Reset Password</h2>
              <p style="margin:0 0 18px; color:#334155; line-height:1.5;">
                Hai, kami menerima permintaan untuk mengatur ulang password akun Anda di <strong>PPDB SLB-B</strong>.
              </p>

              <div style="text-align:center; margin:18px 0;">
                <a href="{{ url('/reset-password/'.$token) }}" target="_blank"
                   style="background:#4f46e5; color:#ffffff; text-decoration:none; padding:12px 20px; border-radius:8px; display:inline-block; font-weight:600;">
                  Reset Password
                </a>
              </div>

              <p style="margin:0 0 18px; color:#475569; font-size:14px; line-height:1.5;">
                Jika tombol di atas tidak bekerja, salin dan buka link berikut di browser Anda:
              </p>

              <p style="word-break:break-all; font-size:13px; color:#0f172a; background:#f1f5f9; padding:10px; border-radius:6px;">
                {{ url('/reset-password/'.$token) }}
              </p>

              <p style="margin:18px 0 0; color:#64748b; font-size:13px; line-height:1.5;">
                Jika Anda tidak meminta reset ini, silakan abaikan email ini — tidak ada perubahan yang akan dibuat pada akun Anda.
              </p>

              <p style="margin:22px 0 0; color:#334155; font-size:14px;">
                Terima kasih,<br>
                <strong>Tim PPDB SLB-B</strong>
              </p>
            </td>
          </tr>

          <tr>
            <td style="background:#f8fafc; padding:12px 32px; font-size:12px; color:#94a3b8;">
              Email ini dikirim otomatis. Kalau butuh bantuan, hubungi admin.
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>