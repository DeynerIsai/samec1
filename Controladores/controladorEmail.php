<?php
include_once '../Plugins/Libs/helper.php';
include_once '../Plugins/Model/User.php';
include_once '../Modelos/Usuario.php';

class controladorEmail
{

    public function EnviarEmail()
    {
        $email = $this->request->getQuery('email');
        if ($email) {
            $emailExist = $this->Usuario->Collaborators->findByEmail($email);
            if ($emailExist->isEmpty()) {
                $this->Flash->error('Tu correo electrónico no está registrado en el sistema');
            } else {
                foreach ($emailExist as $records) {
                    //Get and modify time adding 30 minutes to expiration token
                    $date = Time::now();
                    $date->modify('+30 minute');
                    //Get users records
                    $userTable          = TableRegistry::get('Usuario');
                    $user               = $userTable->find('all')->where(['collaborator_id' => $records->collaboratorId])->first();
                    $mytoken            = Security::hash(Security::randomBytes(25));
                    $user->password     = '';
                    $user->recoveryDate = $date;
                    $user->token        = $mytoken;
                    if ($userTable->save($user)) {
                        $mail = new PHPMailer(true);
                        try {
                            //Server settings
                            $mail->SMTPDebug = 0; //Enable verbose debug output
                            $mail->isSMTP(); //Send using SMTP
                            $mail->Host       = 'smtp.pepipost.com'; //Set the SMTP server to send through
                            $mail->SMTPAuth   = true; //Enable SMTP authentication
                            $mail->Username   = 'deyneringpro'; //SMTP username
                            $mail->Password   = 'deyneringpro_d13cae0d7726bdf4bc9f09906ada6958'; //SMTP password
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                            $mail->Port       = 25; //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                            //Recipients
                            $mail->setFrom('deyneringpro@pepisandbox.com', 'Mailer');
                            $mail->addAddress('deynerjd1116@gmail.com', 'Deyner Isai'); //Add a recipient
                            $mail->addReplyTo('deyneringpro@pepisandbox.com', 'Information');

                            //$mail->addAttachment('C:\Users\Andres_Garcia\Documents\FilesDownloads\CurriculumATI2021.pdf');
                            //Content
                            $mail->isHTML(true);
                            $mail->CharSet = 'UTF-8'; //Set email format to HTML
                            $mail->Subject = 'Restablecimiento de contraseña';
                            $mail->Body    = '
                                <html>
                                <head>
                                </head>
                                Hola ' . $records->name . ' ' . $records->lastname .
                                '<br>Para restablecer tu contrase&ntilde;a haga clic en el enlace <br>' .
                                '<a href="localhost/SCA_v1.4/users/resetPassword/' . $mytoken . '">Restablecer contrase&ntilde;a</a><br>
                                Este enlace es v&aacute;lido por 30 minutos
                                </html>';

                            $mail->send();
                            $this->Flash->success('Se ha enviado el link de restablecimiento de contraseña al correo: ' . $records->Email .
                                'Por favor abra su bandeja');
                            $this->redirect(['action' => 'login']);
                        } catch (Exception $e) {
                            $this->Flash->error('No se pudo enviar el link de restablecimiento de contraseña
                                . Por favor intenta de nuevo');
                        }
                    } else {
                        $this->Flash->error('No se pudo enviar el link de restablecimiento de contraseña
                            . Por favor intenta de nuevo');
                    }
                }
            }
        } else {
            //$this->Flash->error('Por favor ingrese su correo electrónico');
        }
    }
