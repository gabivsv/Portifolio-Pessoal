<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    $para = "contatogabrielavieirasv@gmail.com";
    $assunto = "Contato - Gabriela Vieira";

    $corpo = "Nome: $nome\nEmail: $email\nMensagem: $mensagem\n";

    $cabeca = "From: $email\r\n";
    $cabeca .= "Reply-To: $email\r\n";
    $cabeca .= "X-Mailer: PHP/" . phpversion();

    if (mail($para, $assunto, $corpo, $cabeca)) {
        echo "E-mail enviado com sucesso!";
    } else {
        echo "Houve um erro ao enviar o e-mail.";
    }
}
?>
