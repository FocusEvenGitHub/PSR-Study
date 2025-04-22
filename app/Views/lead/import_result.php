<h1>Resultados da Importação</h1>

<h2>Sucesso (<?= count($results['success']) ?>)</h2>
<ul>
    <?php foreach ($results['success'] as $dto): ?>
        <li><?= htmlspecialchars($dto->getEmail()) ?> - <?= htmlspecialchars($dto->getSource()) ?></li>
    <?php endforeach; ?>
</ul>

<h2>Erros (<?= count($results['errors']) ?>)</h2>
<ul>
    <?php foreach ($results['errors'] as $error): ?>
        <li>Linha <?= $error['line'] ?>: <?= implode(', ', $error['errors']) ?></li>
    <?php endforeach; ?>
</ul>
