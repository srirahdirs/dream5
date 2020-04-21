<?php
$verifyLink = $link;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">   
    </head>
    <body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #fff;">    
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" style="max-width: 680px;min-width: 360px;width: 100%;margin: 0 auto;" class="email-container">
            
            <tr>
                <td style="background-color: #ffffff;">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" style="max-width: 680px;min-width: 360px;width: 100%;">
                        <tr>
                            <td style="padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                                <p style="margin: 0 0 20px;">Hi <b><?= $user->username ?></b>,</p>
                                <p style="margin: 0 0 20px;">Please verify that your email address is <?= $user->email ?> and that you entered it when signing up for<span style="font-family: sans-serif;font-size: 17px;font-weight:800;line-height: 15px; color:#FFDD00;"> DREAM<b>5</b></span> Network. This link is valid for only the next 60 minutes.</p>
                                <p style="margin: 0 0 20px;">Please click the button to verify</p>
                                <a href="<?= $link ?>" style="font-family: sans-serif;font-size: 15px;line-height: 15px; color:#000;background: #FFDD00;padding:10px 20px;text-decoration:none;border-radius:10px;"><?= 'Verify' ?></a>

                                <p style="margin:20px 0 20px 0;">or copy paste the following link to verify</p>
                                <p><a href="javascript:void(0);" style="font-family: sans-serif;font-size: 15px;line-height: 15px; color:#000;text-align: left;"><?= $verifyLink ?></a></p>
                                <p>We will use this email to communicate about your account but otherwise your email stays private.</p>
                                <p>Thanks</p>
                                <p>The <span style="font-weight:800;font-family: sans-serif;font-size: 17px;line-height: 15px; color:#FFDD00;">DREAM<b>5</b></span> Team</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>       
    </body>
</html>
