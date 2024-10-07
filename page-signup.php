<?php
/*
Template Name: Sign Up Page
*/

get_header();
?>

<main id="signup-page">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <form id="signupForm">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
        <div id="signup-message"></div>
    </div>
</main>

<?php get_footer(); ?>