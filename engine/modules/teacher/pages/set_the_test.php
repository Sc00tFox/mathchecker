<?php
    //======================================================
    //  Created by Team-9 Mathchecker Team
    //  Copyright © Mathchecker 2020 All rights reserved. 
    //======================================================

    include("./engine/db/db_config.php");

    teacher_session();

    $subject_name = NULL;
    if (isset($_GET['subject'])){
        $subject_name = $_GET['subject'];
    }

    $group_name = NULL;
    if (isset($_GET['group'])){
        $group_name = $_GET['group'];
    }

    $subjects_list = mysqli_query($link, "SELECT * FROM Subjects" );
    $group_list = mysqli_query($link, "SELECT * FROM StudentGroup" );
?>

<!doctype html>
<html lang="ru">
    <head>
        <!--    MEta-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--    Libs-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./engine/libs/bootstrap-4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="./engine/libs/fontawesome-5.13.0/css/all.min.css">
        <link rel="stylesheet" href="./engine/libs/MC-icon/MC-icon.css">
        <link rel="stylesheet" href="./engine/libs/core/css/profile/main.css">
        <link rel="shortcut icon" href="./engine/images/index/favicon.ico" type="image/x-icon">
        <title>Выставить задание</title>
    </head>
    <body>
        <?php require("./engine/libs/core/php/dyheader.php"); ?>

        <section>
            <div class="container-fluid">
                <div class="row">
                    <?php require("./engine/modules/teacher/php/menu.php"); ?>

                    <div class="col-2 options">
                        <div class="row">
                            <div class="col title-blue options__title">
                                <i class="fas fa-square-root-alt"></i> Дисциплины
                                <hr class="hr-blue">
                            </div>
                        </div>

                        <div class="row options__box-sections">
                            <?php while($subjects_array = $subjects_list -> fetch_object()):?>
                            <a href="index?page=teacher&sub=set_the_test&subject=<?=str_replace(' ', '_', $subjects_array -> SubjectTitle);?>" id="<?=str_replace(' ', '_', $subjects_array -> SubjectTitle);?>" class="col-12 options__box-sections_section">
                                <?=$subjects_array -> SubjectTitle;?>
                            </a>
                            <?php endwhile;?>
                        </div>
                    </div>

                    <?php if($subject_name != NULL):?>
                        <div class="col-2 options">
                            <div class="row">
                                <div class="col  title-blue options__title">
                                    <i class="fas fa-users"></i> Группы
                                    <hr class="hr-blue">
                                </div>
                            </div>

                            <div class="row options__box-sections">
                                <?php while($group_array = $group_list -> fetch_object()):?>
                                    <a href="index?page=teacher&sub=set_the_test&subject=<?=$subject_name;?>&group=<?=$group_array -> StudGroupTitle?>" id="<?=$group_array -> StudGroupTitle?>" class="col-12 options__box-sections_section"><?=$group_array -> StudGroupTitle?></a>
                                <?php endwhile;?>
                            </div>
                        </div>
                    <?php endif;?>

                    <?php if($group_name != NULL):?>
                        <div class="col-6">
                            <div class="container-fluid white-box set_the_test">
                                <div class="row"><h2 class=" col-12">Тема</h2>
                                    <div class="col-10"><input class="col-12 input-blue" type="text" name="theme"></div>
                                </div>

                                <div class="row"><h2 class=" col-12">Срок сдачи</h2>
                                    <div class="col-10"><input class="col-5 input-blue" type="date" name="deadline" placeholder="гггг-мм-дд"></div>
                                </div>

                                <div class="row"><h2 class=" col-12">Комментарий к работе</h2>
                                    <div class="col-10"><textarea class="col-12 input-blue" rows="5" name="comment"></textarea></div>
                                </div>

                                <div class="row set_the_test__task">
                                    <h3 class=" col-12">Задание №1</h3>
                                    <div class="col-12"><textarea class="col-12 input-blue"></textarea></div>
                                    <div class="col-12">Варианты ответов</div>
                                    <div class="col-10"><textarea class="col-12 input-blue" rows="4"></textarea></div>
                                    <!--If clicked on the plus.-->
            <!--                        <div class="col-3"><input class="col-12 input-blue"></div>-->

            <!--                        <div class="col-1"><i class="fas fa-minus"></i></div>-->

                                    <div class="col-12"><input class="col-6 input-blue" placeholder="Правильный ответ"></div>

                                    <h3 class=" col-12">Задание №2</h3>
                                    <div class="col-12"><textarea class="col-12 input-blue"></textarea></div>
                                    <div class="col-12">Варианты ответов</div>
                                    <div class="col-10"><textarea class="col-12 input-blue" rows="4"></textarea></div>

                                    <div class="col-12"><input class="col-6 input-blue" placeholder="Правильный ответ"></div>

                                    <h3 class=" col-12">Задание №3</h3>
                                    <div class="col-12"><textarea class="col-12 input-blue"></textarea></div>
                                    <div class="col-12">Варианты ответов</div>
                                    <div class="col-10"><textarea class="col-12 input-blue" rows="4"></textarea></div>

                                    <div class="col-12"><input class="col-6 input-blue" placeholder="Правильный ответ"></div>

                                    <h3 class=" col-12">Задание №4</h3>
                                    <div class="col-12"><textarea class="col-12 input-blue"></textarea></div>
                                    <div class="col-12">Варианты ответов</div>
                                    <div class="col-10"><textarea class="col-12 input-blue" rows="4"></textarea></div>

                                    <div class="col-12"><input class="col-6 input-blue" placeholder="Правильный ответ"></div>

                                    <h3 class=" col-12">Задание №5</h3>
                                    <div class="col-12"><textarea class="col-12 input-blue"></textarea></div>
                                    <div class="col-12">Варианты ответов</div>
                                    <div class="col-10"><textarea class="col-12 input-blue" rows="4"></textarea></div>

                                    <div class="col-12"><input class="col-6 input-blue" placeholder="Правильный ответ"></div>

                                    <h3 class=" col-12">Задание №6</h3>
                                    <div class="col-12"><textarea class="col-12 input-blue"></textarea></div>
                                    <div class="col-12">Варианты ответов</div>
                                    <div class="col-10"><textarea class="col-12 input-blue" rows="4"></textarea></div>

                                    <div class="col-12"><input class="col-6 input-blue" placeholder="Правильный ответ"></div>

                                    <h3 class=" col-12">Задание №7</h3>
                                    <div class="col-12"><textarea class="col-12 input-blue"></textarea></div>
                                    <div class="col-12">Варианты ответов</div>
                                    <div class="col-10"><textarea class="col-12 input-blue" rows="4"></textarea></div>

                                    <div class="col-12"><input class="col-6 input-blue" placeholder="Правильный ответ"></div>

                                    <h3 class=" col-12">Задание №8</h3>
                                    <div class="col-12"><textarea class="col-12 input-blue"></textarea></div>
                                    <div class="col-12">Варианты ответов</div>
                                    <div class="col-10"><textarea class="col-12 input-blue" rows="4"></textarea></div>

                                    <div class="col-12"><input class="col-6 input-blue" placeholder="Правильный ответ"></div>

                                    <h3 class=" col-12">Задание №9</h3>
                                    <div class="col-12"><textarea class="col-12 input-blue"></textarea></div>
                                    <div class="col-12">Варианты ответов</div>
                                    <div class="col-10"><textarea class="col-12 input-blue" rows="4"></textarea></div>

                                    <div class="col-12"><input class="col-6 input-blue" placeholder="Правильный ответ"></div>

                                    <h3 class=" col-12">Задание №10</h3>
                                    <div class="col-12"><textarea class="col-12 input-blue"></textarea></div>
                                    <div class="col-12">Варианты ответов</div>
                                    <div class="col-10"><textarea class="col-12 input-blue" rows="4"></textarea></div>

                                    <div class="col-12"><input class="col-6 input-blue" placeholder="Правильный ответ"></div>
                                </div>

                                <!-- <div class="row text-center">
                                    <div class="col-12"><i class="fas fa-plus"></i> Добавить задание</div>
                                </div> -->

                                <div  class="row box-file">
                                    <h2 class="col-12">Добавить файл</h2>
                                    <div class="col-12 input-blue">
                                        <input name="file" type="file" id="field__file-2" class="field field__file" multiple>
                                        <label class="field__file-wrapper" for="field__file-2">
                                            <div class="field__file-button"><i class="fas fa-plus"></i> Прикрепить файл</div>
                                            <div class="field__file-fake">Файл не выбран</div>
                                        </label>
                                    </div>
                                </div>

                                <div class="row"></div>
                                <div class="row box-test__box-btn">
                                    <a href="#" class="btn-blue">Выставить задание</a>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>

                </div>
            </div>
        </section>

        <script>
            let fields = document.querySelectorAll('.field__file');
            Array.prototype.forEach.call(fields, function (input) {
                let label = input.nextElementSibling,
                    labelVal = label.querySelector('.field__file-fake').innerText;

                input.addEventListener('change', function (e) {
                    let countFiles = '';
                    if (this.files && this.files.length >= 1)
                        countFiles = this.files.length;

                    if (countFiles)
                        label.querySelector('.field__file-fake').innerText = 'Выбрано файлов: ' + countFiles;
                    else
                        label.querySelector('.field__file-fake').innerText = labelVal;
                });
            });
        </script>
        <script src="./engine/libs/bootstrap-4.4.1/js/jquery.min.js"></script>
        <script src="./engine/libs/bootstrap-4.4.1/js/popper.min.js"></script>
        <script src="./engine/libs/bootstrap-4.4.1/js/bootstrap.min.js"></script>
        <script src="./engine/modules/teacher/js/menu_selector_stt.js"></script>
        <script src="./engine/modules/teacher/js/subject_menu_selector.js"></script>
        <script src="./engine/modules/teacher/js/group_menu_selector.js"></script>

        <div hidden class="subject_active" value="<?=$subject_name?>"></div>
        <div hidden class="studgroup_active" value="<?=$group_name?>"></div>
    </body>
</html>