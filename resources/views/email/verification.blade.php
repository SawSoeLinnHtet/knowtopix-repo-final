<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background-color: #e9ecef; font-family: Arial, Helvetica, sans-serif">
    <div style="height: auto; background-color: #e2ebf5; border-top: 2px solid #bdbdbd; margin: 0 auto; padding: 10px">
        <table style="margin: 0px auto">
            <tr>
                <td>
                    <p style="font-size: 25px; text-align: center; font-weight: bold; color: #000">Confirm Your Email Address</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Dear, <span style="font-weight: bold; font-size: 16px; color: #180836;">{{ $user->name }}</span></p>
                    <p style="margin-left: 20px;">Please click on the verification to continue your registration.</p>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <a href="{{ $verification_link }}" style="color: #fff; text-decoration: none; text-align: center; padding: 10px 20px; background-color: rgb(13, 68, 219); font-size: 14px; font-weight: bold; border: 1px solid #0a398f; border-radius: 5px; margin: 0px auto">Click To Verify</a>
                </td>
            </tr>

            <tr>
                <td>
                    <p style="color: #000; font-weight: normal">Thank you for using our website!</p>
                    <p style="color: #071225; font-weight: bold">KNOWTOPIX,</p>
                    <p style="font-size: 14px">Team</p>
                </td>
            </tr>

            <tr>
                <td>
                    <em style="font-size: 13px; color: red; font-weight: 800">This is a computer auto generated email and please do not reply.</em>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>