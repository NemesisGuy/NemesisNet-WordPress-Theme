<?php
/**
 * Components Reference File
 *
 * This file contains all reusable components in one place, with inline examples and usage instructions.
 * Use this as a single source of truth for understanding and using the theme's components.
 */

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Components</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>NemesisNet Theme: All Components</h1>

    <!-- Glassmorphic Card -->
    <section>
        <h2>Glassmorphic Card</h2>
        <div class="glass-card">
            <h3 class="card-title">Card Title</h3>
            <p class="card-content">This is a sample card content. Replace this with dynamic content as needed.</p>
        </div>
    </section>

    <!-- Primary CTA Button -->
    <section>
        <h2>Primary CTA Button</h2>
        <button class="btn-primary">Click Me</button>
    </section>

    <!-- Ghost Button -->
    <section>
        <h2>Ghost Button</h2>
        <button class="btn-ghost">Click Me</button>
    </section>

    <!-- Hero Links -->
    <section>
        <h2>Hero Links</h2>
        <div class="hero-links">
            <a href="#" class="hero-link">Our Work</a>
            <a href="#" class="hero-link">About Us</a>
            <a href="mailto:hello@nemesisnet.co.za" class="hero-link">Contact</a>
        </div>
    </section>

    <!-- Pills & Tags -->
    <section>
        <h2>Pills & Tags</h2>
        <div class="pills">
            <span class="pill">AI Systems</span>
            <span class="pill">Docker</span>
            <span class="pill">DevOps</span>
        </div>
    </section>

    <!-- Aurora Button -->
    <section>
        <h2>Aurora Button</h2>
        <?php include 'components/button-aurora.php'; ?>
    </section>

    <!-- Avatar -->
    <section>
        <h2>Avatar / Mark</h2>
        <?php include 'components/avatar.php'; ?>
    </section>

    <!-- Footer -->
    <section>
        <h2>Footer</h2>
        <?php include 'components/footer.php'; ?>
    </section>
</body>
</html>