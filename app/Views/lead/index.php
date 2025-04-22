<h1>Lista de Leads</h1>

<ul>
    <?php foreach ($leads as $lead): ?>
        <li><?= htmlspecialchars($lead->getEmail()) ?> - <?= htmlspecialchars($lead->getSource()) ?></li>
    <?php endforeach; ?>
</ul>
