<?php
include 'header.php';
include 'navigation.php';
?>

<!-- Contact -->
<section id="contact" class="main style3 secondary">
    <div class="content">
        <header>
            <h2>Say Hello.</h2>
            <p>Lorem ipsum dolor sit amet et sapien sed elementum egestas dolore condimentum.</p>
        </header>
        <div class="box">
            <form method="post" action="#">
                <div class="field half first">
                    <input type="text" name="name" placeholder="Name" />
                </div>
                <div class="field half">
                    <input type="email" name="email" placeholder="Email" />
                </div>
                <div class="field">
                    <textarea name="message" placeholder="Message" rows="6"></textarea>
                </div>
                <ul class="actions">
                    <li>
                        <input type="submit" value="Send Message" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
</section>

<?php
include 'footer.php';
?>