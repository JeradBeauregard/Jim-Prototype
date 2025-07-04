

<div id="routine_builder_card_container">
    <section id="routine_builder_exercise_card_container">
        <div id="exercise_card_header_container">
            <div id="exercise_card_header_search_container">
                <h2>Exercises</h2>
                <form action="/search" method="GET">
                        <div class="search-wrapper">
                            <label for="search" class="sr-only">Search</label>
                            <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                            <path d="M10 2a8 8 0 105.3 14.3l4.2 4.2a1 1 0 001.4-1.4l-4.2-4.2A8 8 0 0010 2zm0 2a6 6 0 110 12 6 6 0 010-12z" fill="currentColor"/>
                            </svg>
                            <input type="text" id="search" name="query" placeholder="Search...">
                        </div>
                    </form>
            </div>
            <div id="exercise_card_header_underline_container">
            </div>
        </div>
        <div id="exercise_card_main_container">
            <?php foreach ($exercises as $exercise): ?>
<article class="exercise_banner_container">
    <div class="exercise_banner_icon_container">
        <img src="/jim-prototype/public/assets/images/dumbbellman.png" alt="A man lifting weights"/>
    </div>
    <div class="exercise_banner_info_container">
        <div class="exercise_banner_header_container">
            <h3><?= htmlspecialchars($exercise['name'] ?? 'Unnamed Exercise') ?></h3>
        </div>
        <div class="exercise_banner_details_container">
            <p>
                <?= htmlspecialchars($exercise['muscle_group'] ?? 'N/A') ?> —
                <?= htmlspecialchars($exercise['equipment'] ?? 'N/A') ?> —
                <?= htmlspecialchars($exercise['type'] ?? 'N/A') ?>
            </p>
        </div>
    </div>
    <div class="exercise_banner_add_container">
        <form action="" method="POST">
            <input type="hidden" name="exercise_id" value="<?= $exercise['id'] ?>">
            <button type="submit">+</button>
        </form>
    </div>
    <div class="exercise_banner_dropdown_icon_container">
        <form action="" method="POST">
            <input type="hidden" name="exercise_id" value="<?= $exercise['id'] ?>">
            <button type="submit">
                <svg width="40" height="24" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0l5 6 5-6H0z" fill="currentColor"/>
                </svg>
            </button>
        </form>
    </div>
    <div class="exercise_banner_dropdown_container">
        <div class="exercise_banner_dropdown_favourite_container"></div>
        <div class="exercise_banner_dropdown_accent_container"></div>
        <div class="exercise_banner_dropdown_details_container">
            <dl class="exercise-details">
                <div class="detail-row">
                    <dt>Sets</dt>
                    <dd><?= $exercise['default_sets'] ?? 0 ?></dd>
                </div>
                <div class="detail-row">
                    <dt>Reps</dt>
                    <dd><?= $exercise['default_reps'] ?? 0 ?></dd>
                </div>
                <div class="detail-row">
                    <dt>Weight</dt>
                    <dd><?= $exercise['default_weight'] ?? 0 ?> lbs</dd>
                </div>
                <div class="detail-row">
                    <dt>Time per Set</dt>
                    <dd><?= round(($exercise['default_time_per_set'] ?? 0) / 60, 1) ?> min</dd>
                </div>
                <div class="detail-row">
                    <dt>Time Between Sets</dt>
                    <dd><?= round(($exercise['default_rest'] ?? 0) / 60, 1) ?> min</dd>
                </div>
            </dl>
        </div>
    </div>
</article>
<?php endforeach; ?>
        </div>
    </section>
    <section id="routine_builder_new_routine_card_container">
    </section>
</div>