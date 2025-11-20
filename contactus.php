<?php
$target = '';
$title = "Contact Us";
require_once "includes/head.inc"
?>
<body>
    <?php
    require_once "includes/header.inc"
    ?>

    <main>
        <section aria-labelledby="contact-form">
            <h2 id="contact-form">Contact Form</h2>
            <form class="contact-form">
                <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" required>
                </div>

                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>

                <button type="submit" class="submit-btn">Send Inquiry</button>
            </form>
        </section>
    </main>

    <?php
    require_once "includes/footer.inc"
    ?>
</body>
</html>
