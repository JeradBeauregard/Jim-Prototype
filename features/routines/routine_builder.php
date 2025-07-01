<link rel="stylesheet" href="/jim-prototype/public/assets/css/routinebuilder.css">
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
            <article id="exercise_banner_container">
                <div id="exercise_banner_icon_container">
                </div>
                <div id="exercise_banner_info_container">
                    <div id="exercise_banner_header_container">
                        <h3>Dumbbell Row</h3>
                    </div>
                    <div id="exercise_banner_details_container">
                        <p>Back -- Dumbbell -- Compound</p>
                    </div>
                </div>
                <div id="exercise_banner_add_container">
                </div>
                <div id="exercise_banner_dropdown_container">
                    <div id="exercise_banner_dropdown_favourite_container">
                    </div>
                    <div id="exercise_banner_dropdown_accent_container">
                    </div>
                    <div id="exercise_banner_dropdown_details_container">
                        <dl class="exercise-details">
                            <div class="detail-row">
                                <dt>Sets</dt>
                                <dd>3</dd>
                            </div>
                            <div class="detail-row">
                                <dt>Reps</dt>
                                <dd>12</dd>
                            </div>
                            <div class="detail-row">
                                <dt>Weight</dt>
                                <dd>120 lbs</dd>
                            </div>
                            <div class="detail-row">
                                <dt>Time per Set</dt>
                                <dd>2 min</dd>
                            </div>
                            <div class="detail-row">
                                <dt>Time Between Sets</dt>
                                <dd>2 min</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </article>
        </div>
    </section>
    <section id="routine_builder_new_routine_card_container">
    </section>
</div>