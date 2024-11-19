
<h5 style="color: red">IJRO.GOV.UZ тизими оркали ЭРИ билан тасдикланган, Хужжат коди: <?=$model->document_code?></h5>
<div class="" style="width: 100%;">
    <img src="<?=$headerLogo?>" alt="" style="bottom: 20px; width: 1000px" >
</div>
<div class="content">


<div class="row" style="margin-left: 20px; ">
    <table style="width: 90%; text-align: center">
        <tr>
            <td style="width: 50%;">
                <span style="margin-left: 200px; font-weight: bold">

                <?php
                $timestamp = strtotime($model->document_date);


                // IntlDateFormatter yordamida formatlash
                $formatter = new IntlDateFormatter(
                    'ru_RU', // Mahalliylashgan til (rus tili)
                    IntlDateFormatter::LONG, // Uzoq format (to‘liq oy nomi)
                    IntlDateFormatter::NONE, // Faqat sana (vaqt emas)
                    'Asia/Tashkent', // Vaqt zonasi
                    IntlDateFormatter::TRADITIONAL
                );

                $formatted_date = $formatter->format($timestamp);

                // Oxiriga "йил" qo'shish
                $formatted_date .= " йил";

                // Natijani chiqarish
                echo $formatted_date;

                ?>
                </span>
            </td>
            <td style="width: 50%; text-align: right">
                <span style="font-weight: bold">
                    №<?=$model->document_number?>
                </span>
            </td>
        </tr>
    </table>

    <h4 style="text-align: center;">НАМАНГАН ШАҲАР ҲОКИМИНИНГ</h4>
    

    <table style="width: 90%; text-align: center">
        <tr>
            <td style="width: 50%;">
                <span style="margin-left: 200px; ">

                <?php
                    $timestamp = strtotime($model->resolution_date);

                    // Array of Uzbek month names
                    $uzbek_months = [
                        1 => "январь",
                        2 => "февраль",
                        3 => "март",
                        4 => "апрел",
                        5 => "май",
                        6 => "июнь",
                        7 => "июль",
                        8 => "август",
                        9 => "сентябрь",
                        10 => "октябрь",
                        11 => "ноябрь",
                        12 => "декабрь"
                    ];
                    
                    // Extract the year, day, and month
                    $year = date("Y", $timestamp);
                    $month = (int)date("m", $timestamp); // Convert to integer for array lookup
                    $day = date("d", $timestamp);
                    
                    // Format the date
                    $formatted_date = $year . "-йил " . $day . "-" . $uzbek_months[$month].'даги';
                    
                    echo $formatted_date;
                ?>
                </span>
            </td>
            <td style="width: 50%; text-align: right">
                <span style="margin-left: 200px; ">
                    №<?=$model->resolution_number?>-сонли қароридан
                </span>
            </td>
        </tr>
    </table>

    

    <h4 style="text-align:center; font-weight: bold; text-transform: uppercase;">
        Архив кўчирмаси
    </h4>
    <div class="" style="width: 90%; text-align: justify; margin-left: 50px">
        <?=$modelDetails->main_content?>
    </div>


    


    <h4 style="text-align:center; font-weight: bold; text-transform: uppercase;">
        Қ А Р О Р &nbsp;&nbsp; &nbsp;&nbsp;  Қ И Л И Н А Д И:
    </h4>

    <div class="" style="width: 90%; text-align: justify; margin-left: 50px">
        <?=$modelDetails->resolution_content?>
    </div>
    

    <table style="width: 100%; text-align: center;">
        <tr style="margin:0; padding: 0">
            <td style="width: 33%; text-align: right">Шаҳар ҳокими</td>
            <td style="width: 33%;">Имзо</td>
            <td style="width: 33%; text-align: left"><?= $modelDetails->mayor_of_the_city ?></td>
        </tr>
        <tr style="margin:0; padding: 0">
            <td style="width: 33%; text-align: right">Аслига тўғри</td>
            <td style="width: 33%;" rowspan="2">
                <img src="<?= $qrImageData ?>" alt="QR Code" style="width: 120px; height: 120px;">
            </td>
            <td style="width: 33%;"></td>

        </tr>
        <tr style="margin:0; padding: 0">
            <td style="width: 33%; font-weight: bold; text-align: right">Архив мудири</td>
            <td style="width: 33%; text-align: left"><?= $modelDetails->archive_head ?></td>
        </tr>
    </table>

    
</div>

