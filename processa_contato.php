<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclua o autoload do PHPMailer
require 'vendor/autoload.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    // Configurações do servidor SMTP
    $mail = new PHPMailer(true);
    try {
        // Configurações do servidor de e-mail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'codexusoficial@gmail.com'; // Seu e-mail
        $mail->Password = 'seap mvbc etxu wogf';      // Sua senha
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configurações do e-mail
        $mail->setFrom('codexusoficial@gmail.com', 'Equipe Codexus'); // Remetente
        $mail->addAddress($email, $nome); // Destinatário
        $mail->isHTML(true);
        $mail->Subject = "Boa tarde, senhor(a) $nome";
        $mail->Body = "
            <p>Obrigado por entrar em contato conosco.</p>
            <p>Sabemos que você está buscando inovar e fortalecer sua marca, e estamos aqui para ajudar!</p>
            <p>Nosso time está à disposição para entender suas necessidades e propor soluções personalizadas que atendam aos seus objetivos.</p>
            <p><strong>Contato direto:</strong></p>
            <p>Telefone: (19) 99898-0252</p>
            <br>
            <p>Atenciosamente,</p>
            <p>Equipe Codexus</p>
        ";

        // Envia o e-mail
        $mail->send();
        echo "<script>alert('E-mail enviado com sucesso!'); window.location.href = 'index.html';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Erro ao enviar o e-mail: {$mail->ErrorInfo}'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Método inválido.'); window.history.back();</script>";
}
?>
