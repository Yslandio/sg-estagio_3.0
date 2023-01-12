<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SG-Estágio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <?php date_default_timezone_set('America/Sao_Paulo'); // Seta o fuso-horário de Brasília ?>
</head>

<body>
    <div class="container pb-3">
        <div class="col-12">
            <h3 class="title text-center my-2">CADASTRO DE FERIADOS / DATAS NÃO LETIVAS</h3>
        </div>

        <div class="d-flex justify-content-center p-4">
            <a class="btn btn-outline-primary" href="datas.php">Cadastrar Data</a>
        </div>

        <hr class="my-4">

        <div class="col-12">
            <h3 class="title text-center my-2">CÁLCULO DE HORAS DE ESTÁGIO</h3>
        </div>

        <form class="col-12 d-flex justify-content-center align-items-end flex-wrap" action="#" method="get">
            <div class="col-12 m-2">
                <div class="d-flex flex-wrap justify-content-around">
                    <?php
                    $diasSemana = ['monday' => 'Segunda', 'tuesday' => 'Terça', 'wednesday' => 'Quarta', 'thursday' => 'Quinta', 'friday' => 'Sexta', 'saturday' => 'Sábado', 'sunday' => 'Domingo'];
                    $weekDays = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
                    foreach ($weekDays as $key => $weekDay) {
                    ?>
                        <div class='box-day d-flex flex-column border border-2 rounded p-2 m-2'>
                            <div class='border border-1 rounded shadow-sm p-2 bg-light'>
                                <div class="form-check">
                                    <input class='form-check-input' type='checkbox' id='<?= $weekDay ?>' name='<?= $weekDay ?>' value='<?= ($key + 1) ?>' <?= isset($_GET[$weekDay]) ? 'checked' : '' ?> onClick='weekDayCheckBox("<?= $weekDay ?>");'>
                                    <label class='form-check-label' for='<?= $weekDay ?>'>
                                        <?php
                                        foreach ($diasSemana as $key => $diaSemana) {
                                            if ($key == $weekDay) {
                                                echo $diaSemana;
                                                break;
                                            }
                                        }
                                        ?>
                                    </label>
                                </div>
                            </div>
                            <div>
                                <label class='form-label'>Horas:</label>
                                <input class='form-control' id='hours_<?= $weekDay ?>' type='number' name='hours_<?= $weekDay ?>' min='0' value='<?= $_GET['hours_' . $weekDay] ?? '' ?>' disabled required>
                            </div>
                            <div>
                                <label class='form-label'>Minutos:</label>
                                <input class='form-control' id='minutes_<?= $weekDay ?>' type='number' name='minutes_<?= $weekDay ?>' min='0' max='59' value='<?= $_GET['minutes_' . $weekDay] ?? '' ?>' disabled required>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-12 d-flex flex-wrap justify-content-center align-items-end">
                <div class="m-2">
                    <label class="form-label">Início do estágio:</label>
                    <input class="form-control w-auto" type="date" name="date_start_stage" value="<?= $_GET['date_start_stage'] ?? '' ?>">
                </div>
                <div class="m-2">
                    <label class="form-label">Fim do semestre:</label>
                    <input class="form-control w-auto" type="date" name="date_end_semester" value="<?= $_GET['date_end_semester'] ?? '' ?>">
                </div>
                <div class="m-2">
                    <label class="form-label">Horas de estágio (Ex.: 50):</label>
                    <input class="form-control w-auto" type="number" name="hours_stage_course" min="0" value="<?= $_GET['hours_stage_course'] ?? '' ?>">
                </div>
                <div class="my-2">
                    <button class="btn btn-outline-success" type="submit" name="submit">Calcular</button>
                </div>
            </div>
        </form>

        <?php
        if (isset($_GET['submit']) && !empty($_GET['hours_stage_course']) && !empty($_GET['date_start_stage']) && !empty($_GET['date_end_semester'])) {
            if (strtotime($_GET['date_start_stage']) < strtotime($_GET['date_end_semester'])) {
                if (!empty($_GET['monday']) || !empty($_GET['tuesday']) || !empty($_GET['wednesday']) || !empty($_GET['thursday']) || !empty($_GET['friday']) || !empty($_GET['saturday']) || !empty($_GET['sunday'])) {
                    $hoursStageCourse = $_GET['hours_stage_course'];

                    $minutesDays = $hoursDays = $days = [
                        'monday' => false, 'tuesday' => false, 'wednesday' => false, 'thursday' => false, 'friday' => false, 'saturday' => false, 'sunday' => false
                    ];

                    $hoursWeek = 0;
                    $minutesWeek = 0;

                    $conf = true; // Controla a verificação se os dias selecionados são diferentes de vazio
                    foreach ($weekDays as $weekDay) {
                        if (isset($_GET[$weekDay]) && empty($_GET['hours_' . $weekDay]) && empty($_GET['minutes_' . $weekDay])) {
                            $conf = false;
                            break;
                        }

                        $days[$weekDay] = $_GET[$weekDay] ?? false;
                        $hoursWeek += $hoursDays[$weekDay] = $_GET['hours_' . $weekDay] ?? 0;
                        $minutesWeek += $minutesDays[$weekDay] = $_GET['minutes_' . $weekDay] ?? 0;
                    }

                    while ($minutesWeek >= 60) {
                        $minutesWeek -= 60;
                        $hoursWeek++;
                    }

                    $hoursWeek += $minutesWeek * 0.01;

                    $lastDay = $countPeriodoDays = $countDays = $hoursStage = $minutesStage = 0;

                    $dateEndStage = '';

                    if ($hoursWeek != 0 && $conf || $minutesWeek != 0 && $conf) {
                        $dateStartStage = date("d/m/Y", strtotime($_GET['date_start_stage']));
                        $dateEndSemester = date("d/m/Y", strtotime($_GET['date_end_semester']));

                        $start = new \DateTime($_GET['date_start_stage']);
                        $end = new \DateTime($_GET['date_end_semester']);
                        $end->modify('+1 day'); // Data do final do semestre modificada

                        $endDate = new \DateTime($_GET['date_end_semester']); // Data correta do final do semestre

                        $total_days = $end->diff($start)->days;
                        $period = new \DatePeriod($start, new \DateInterval('P1D'), $end);

                        require('models/feriados.php');
                        require('models/calendario.php');

                        $getHolidays = getHolidays();
                        // getHolidays($dt->format('Y')); // Isso ficava na linha 130 dentro do in_array no lugar da variável $getHolidays, mas para melhorar a performace reduzindo a quantidade de acesso ao banco de dados está sendo realizado a busca de todas as datas na linha 127
                        foreach ($period as $dt) {
                            $countPeriodoDays++;

                            if (!in_array($dt->format('d/m/Y'), $getHolidays) && in_array($dt->format('N'), $days)) {
                                foreach ($weekDays as $key => $weekDay) {
                                    if (($key + 1) == $dt->format('N')) {
                                        $countDays++;
                                        $hoursStage += $hoursDays[$weekDay];
                                        $minutesStage += $minutesDays[$weekDay];
                                        while ($minutesStage >= 60) {
                                            $minutesStage -= 60;
                                            $hoursStage++;
                                        }
                                    }
                                }

                                $dateEndStage = $dt->format('d/m/Y');
                                $dateEndStageFormatAmerican = date_create($dt->format('Y-m-d'));
                                if ($hoursStage >= $hoursStageCourse) break;
                            }
                        }
                        if (!empty($dateEndStageFormatAmerican) && $hoursStage < $hoursStageCourse) {
                            if ($resultado = date_diff($dateEndStageFormatAmerican, $endDate))
                                $countPeriodoDays -= date_interval_format($resultado, '%a'); // Subtrai os dias entre a data do fim de semestre e a data final do estágio
                        }

                        $hoursStage += $minutesStage * 0.01;

                        $msg = 'Cálculo de estágio realizado. Confira o resultado abaixo.';
                        include('components/msg_success.php');
                    } else {
                        $msg = 'Informe as hora(s)/minutos do(s) dia(s) de estágio.';
                        include('components/msg_fail.php');
                    }
                } else {
                    $msg = 'Selecione um dia da semana.';
                    include('components/msg_fail.php');
                }
            } else {
                $msg = 'A data de "Início de estágio" não pode ser igual ou posterior à data de "Fim do semestre".';
                include('components/msg_fail.php');
            }
        } elseif (isset($_GET['submit'])) {
            $msg = 'Preencha os campos obrigatórios.';
            include('components/msg_fail.php');
        }
        ?>

        <hr class="my-4">

        <div class="col-12">
            <h3 class="title text-center my-2">RESULTADO</h3>
        </div>

        <form action="documento.php" method="get">
            <div class="col-12 d-flex flex-wrap gap-2 justify-content-center mb-4">
                <div>
                    <label class="form-label">Dias de estágio:</label>
                    <input class="form-control w-auto" type="text" name="quantidade_dias_estagio" value="<?= !empty($countDays) ? $countDays . ' dia(s)' : ''; ?>" readonly>
                </div>
                <div>
                    <label class="form-label">Dias corridos de estágio:</label>
                    <input class="form-control w-auto" type="text" name="periodo_dias_estagio" value="<?= !empty($countPeriodoDays) ? $countPeriodoDays . ' dia(s)' : ''; ?>" readonly>
                </div>
                <?php 
                    $periodo_dias_estagio = !empty($countPeriodoDays) ? $countPeriodoDays : 0;
                    $estagio_meses_duracao = $estagio_dias_duracao = 0;
                    while ($periodo_dias_estagio >= 30) {
                        $periodo_dias_estagio -= 30;
                        $estagio_meses_duracao++;
                    }
                    $estagio_dias_duracao = $periodo_dias_estagio;
                ?>
                <div>
                    <label class="form-label">Meses de duração do estágio:</label>
                    <input class="form-control w-auto" type="text" name="estagio_meses_duracao" value="<?= !empty($estagio_meses_duracao) ? $estagio_meses_duracao . ' mês(es)' : '' ?>" readonly>
                </div>
                <div>
                    <label class="form-label">Dias de duração do estágio:</label>
                    <input class="form-control w-auto" type="text" name="estagio_dias_duracao" value="<?= !empty($estagio_dias_duracao) ?  $estagio_dias_duracao . ' dia(s)' : '' ?>" readonly>
                </div>
                <div>
                    <label class="form-label">Horas semanais de estágio:</label>
                    <input class="form-control w-auto" type="text" name="quantidade_horas_semanais" value="<?= !empty($hoursWeek) ? $hoursWeek . ' hora(s)' : ''; ?>" readonly>
                </div>
                <div>
                    <label class="form-label">Horas do estágio (<?= $hoursStageCourse ?? ''; ?>):</label>
                    <input class="form-control w-auto" type="text" name="quantidade_horas_estagio" value="<?= !empty($hoursStage) ? $hoursStage  . ' hora(s)' : ''; ?>" readonly>
                </div>
                <div>
                    <label class="form-label">Horas do estágio x 2 (<?= isset($hoursStageCourse) ? $hoursStageCourse * 2 : ''; ?>):</label>
                    <input class="form-control w-auto" type="text" name="quantidade_horas_estagio_dobrado" value="<?= isset($hoursStage) ? $hoursStage * 2 . ' hora(s)' : ''; ?>" readonly>
                </div>
                <div>
                    <label class="form-label">Data final do estágio:</label>
                    <input class="form-control w-auto" type="text" name="date_end_stage" value="<?= $dateEndStage ?? ''; ?>" readonly>
                </div>
            </div>

            <!-- Informar os demais dados setados pelo usuário sobre o estágio para inserir no documento a ser gerado -->
            <input type="hidden" name="date_start_stage" value="<?= $_GET['date_start_stage'] ?? '' ?>">

            <div class="col-12 d-flex flex-wrap gap-2 justify-content-center mb-5" id="gerar_documento">
                <button class="btn btn-outline-secondary" type="submit" name="gerar_documento">Gerar Documento</button>
            </div>
        </form>

        <div class="col-12">
            <?php
            // vamos montar o calendário
            if (isset($dateStartStage) && isset($dateEndSemester)) {
            ?>
                <div class="col-12">
                    <h3 class="title text-center my-2">LEGENDA DO CALENDÁRIO</h3>
                </div>
            <?php
                $legendaStagio = true;
                include('components/legenda.php');

                $yearStartStage = date("Y", strtotime(implode('-', array_reverse(explode('/', $dateStartStage)))));
                $yearEndSemester = date("Y", strtotime(implode('-', array_reverse(explode('/', $dateEndSemester)))));

                if ($yearStartStage == $yearEndSemester) {
                    $anos = [$yearStartStage];
                } else {
                    for ($ano = $yearStartStage; $ano <= $yearEndSemester; $ano++) {
                        $anos[] = $ano;
                    }
                }

                $_SESSION['dias_estagio'] = $days;
                $_SESSION['date_end_stage'] = $dateEndStage;

                foreach ($anos as $key => $ano) {
                    echo '<div class="d-flex flex-wrap justify-content-around bg-light border border-1 rounded my-4">';
                    echo '<h3 class="col-12 text-center my-4">CALENDÁRIO DE ' . $ano . '</h3>';
                    for ($mes = 1; $mes <= 12; $mes++) {
                        montar_calendario($mes, $ano);
                    }
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
    </div>

    <!-- Bootstrap - JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="assets/js/week_days.js"></script>
    <script src="assets/js/alerts.js"></script>
</body>

</html>
