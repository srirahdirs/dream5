
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">   
    </head>
    <body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #fff;">    
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" style="max-width: 680px;min-width: 360px;width: 100%;margin: 0 auto;" class="email-container">
            <tr>
                
                
            </tr>
            <tr>
                <td style="background-color: #ffffff;">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" style="max-width: 680px;min-width: 360px;width: 100%;">
                        <tr>
                            <td style="padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                                <p style="margin: 0 0 20px;">Hi <?= $user->username ?>,</p>
                                <p style="margin: 0 0 20px;">Please click the button to reset Password</p>
                                <p>
                                   
                                    <a href="<?= $link ?>" style="font-family: sans-serif;font-size: 15px;line-height: 15px; color:#000;background: #FFDD00;padding:10px 20px;text-decoration:none;border-radius:10px;"><?= 'Reset Password' ?></a>
                                </p>
                                <p style="margin: 0 0 20px;">or copy paste the following link to reset</p>
                                <p><a href="javascript:void(0);" style="font-family: sans-serif;font-size: 15px;line-height: 15px; color:#000;text-align: left;"><?= $link ?></a></p>
                                <p>We will use this email to communicate about your account but otherwise your email stays private.</p>
                                <p>Thanks</p>
                                <p>The DREAM5 Team</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" style="max-width: 680px;min-width: 360px;width: 100%; margin: 0 auto;" class="email-container">
    <tr>
        <td style="padding: 20px; font-family: sans-serif; font-size: 12px; line-height: 15px; text-align: center; color: #fff; background: #000;">
            <p>P.S We also love hearing from you and helping you with any issues you may be having. </p>
            <p>Please send an email to <a href="mailto:connect@dream5.com" style="color:#f4d61b">connect@dream5.com</a> if you want to ask a question or just say hi.</p>
        </td>
    </tr>
</table>
    </body>
</html>
