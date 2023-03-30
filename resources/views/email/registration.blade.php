<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Email Template</title>
</head>

<body style="background-color: #eaf0f2;">
    <div
        style="max-width: 800px; margin: 0px auto; padding: 50px 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 25px;">

        <div style="text-align: center;">
            <img src="https://platinummilescorporate.com/dev/public/backend/images/logo.png" alt="">
        </div>

        <div style="border-radius: 10px; background-color: #fff; margin-top: 30px; padding: 10px 20px;">
            <p style="text-align: center; color: #29aae1; font-size: 18px;"><strong>Hi, {{ $name }},</strong></p>

            <p>Your have successfully registered on Platinummilescorporate.</p>

            <p>You can log in, using your email and password that you created when registering for our website.</p>

            <a href="{{ $url }}{{ $token }}" onMouseOver="this.style.background='#1097d1'" onMouseOut="this.style.background='#29aae1'"
                style="display:inline-block;border-radius: 25px;background: #29aae1;padding: 10px 25px;color: #fff;text-decoration: none;font-weight: bold;font-size: 14px;">Click
                Now</a>

            <div style="margin: 20px 0;">
            </div>
        </div>
    </div>
</body>

</html>