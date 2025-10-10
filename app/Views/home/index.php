<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title></head>
<body>
<h1>Bem-vindo ao LeadManager</h1>
<nav>
    <ul>
        <li><a href="/lead/importForm">Importar Leads</a></li>
        <li><a href="/lead">Listar Leads</a></li>
    </ul>
</nav>
<h6><?= htmlspecialchars($mensagem) ?></h6>
</body>
</html>