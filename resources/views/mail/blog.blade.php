<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,900" rel="stylesheet">

</head>
<body>
<table style="width: 100%; max-width: 550px;margin: 0 auto;">
    <tr>
        <td>
            <table style="width: 100%; padding-top: 30px;">
                <tr>
                    {{--                    <td style="width: 100%; display: block;text-align: center;margin-bottom: 30px;"><a href="#"><img src="https://dev.codingpixel.com/kay-web/public/front/assets/images/logo.png" alt="site Logo"></a></td>--}}
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 100%;display: block; text-align: center;margin-bottom: 40px;color: #000;font-size: 24px;font-weight: 700;letter-spacing: 0.2px;">Your are receiving this email to let you know about your blog status.</td>
                </tr>
                <tr>
                    <td style="width: 100%;display: block; text-align: center;margin-bottom: 40px;color: #000;font-size: 24px;font-weight: 700;letter-spacing: 0.2px;"><Hello></Hello> {{ $details['full_name'] }}</td>
                </tr>
                <tr>
                    <td style="width: 100%;display: block; text-align: center;color: #000;font-size: 18px;">{{ $details['text'] }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>
