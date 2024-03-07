<?php require "partials/head.php"; ?>
<?php require "partials/nav.php"; ?>
<?php require "partials/banner.php"; ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
        <?php foreach ($notes as $note) : ?>
            <ul>
                <li>
                    <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                        <?= substr($note['body'], 0, 8) . "..." ?>
                    </a>
                </li>
            </ul>
        <?php endforeach; ?>
        <p class="mt-6">
            <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
        </p>

    </div>
</main>
<?php require "partials/footer.php"; ?>