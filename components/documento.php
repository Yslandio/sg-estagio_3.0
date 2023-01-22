<?php
$campos = [
    "concedente_nome",
    "concedente_cnpj",
    "concedente_natureza_juridica",
    "concedente_endereco",
    "concedente_representante",
    "concedente_supervisor",
    "concedente_supervisor_cargo",
    "concedente_supervisor_formacao",

    "estagiario_nome",
    "estagiario_cpf",
    "estagiario_rg",
    "estagiario_orgao_expedidor",
    "estagiario_data_nascimento",
    "estagiario_endereco",
    "estagiario_email",
    "estagiario_curso",
    "estagiario_semestre",
    "estagiario_turno",
    "estagiario_aulas",
    "estagiario_estagio",

    "instituicao_nome",
    "instituicao_cnpj",
    "instituicao_natureza_juridica",
    "instituicao_endereco",
    "instituicao_representante",
    "instituicao_orientador",

    "date_start_stage",
    "date_end_stage",
    "estagio_horas_semanais",
    "estagio_horas_total",
    "estagio_meses_duracao",
    "estagio_dias_duracao",

    "documento_numero",
    "documento_cidade_uf",
    "documento_dia",
    "documento_mes",
    "documento_ano",
    "documento_supervisor_nome",
    "documento_diretor_nome",
];

for ($index = 1; $index <= 6; $index++) {
    $campos[] = "matutino_segunda_{$index}_hora_1";
    $campos[] = "matutino_segunda_{$index}_hora_2";

    $campos[] = "matutino_terca_{$index}_hora_1";
    $campos[] = "matutino_terca_{$index}_hora_2";

    $campos[] = "matutino_quarta_{$index}_hora_1";
    $campos[] = "matutino_quarta_{$index}_hora_2";

    $campos[] = "matutino_quinta_{$index}_hora_1";
    $campos[] = "matutino_quinta_{$index}_hora_2";

    $campos[] = "matutino_sexta_{$index}_hora_1";
    $campos[] = "matutino_sexta_{$index}_hora_2";

    $campos[] = "matutino_sabado_{$index}_hora_1";
    $campos[] = "matutino_sabado_{$index}_hora_2";

    $campos[] = "matutino_domingo_{$index}_hora_1";
    $campos[] = "matutino_domingo_{$index}_hora_2";


    $campos[] = "vespertino_segunda_{$index}_hora_1";
    $campos[] = "vespertino_segunda_{$index}_hora_2";

    $campos[] = "vespertino_terca_{$index}_hora_1";
    $campos[] = "vespertino_terca_{$index}_hora_2";

    $campos[] = "vespertino_quarta_{$index}_hora_1";
    $campos[] = "vespertino_quarta_{$index}_hora_2";

    $campos[] = "vespertino_quinta_{$index}_hora_1";
    $campos[] = "vespertino_quinta_{$index}_hora_2";

    $campos[] = "vespertino_sexta_{$index}_hora_1";
    $campos[] = "vespertino_sexta_{$index}_hora_2";

    $campos[] = "vespertino_sabado_{$index}_hora_1";
    $campos[] = "vespertino_sabado_{$index}_hora_2";

    $campos[] = "vespertino_domingo_{$index}_hora_1";
    $campos[] = "vespertino_domingo_{$index}_hora_2";


    $campos[] = "noturno_segunda_{$index}_hora_1";
    $campos[] = "noturno_segunda_{$index}_hora_2";

    $campos[] = "noturno_terca_{$index}_hora_1";
    $campos[] = "noturno_terca_{$index}_hora_2";

    $campos[] = "noturno_quarta_{$index}_hora_1";
    $campos[] = "noturno_quarta_{$index}_hora_2";

    $campos[] = "noturno_quinta_{$index}_hora_1";
    $campos[] = "noturno_quinta_{$index}_hora_2";

    $campos[] = "noturno_sexta_{$index}_hora_1";
    $campos[] = "noturno_sexta_{$index}_hora_2";

    $campos[] = "noturno_sabado_{$index}_hora_1";
    $campos[] = "noturno_sabado_{$index}_hora_2";

    $campos[] = "noturno_domingo_{$index}_hora_1";
    $campos[] = "noturno_domingo_{$index}_hora_2";
}

foreach ($campos as $key => $value) {
    if (empty($_POST[$value]))
        $_POST[$value] = null;
    if (in_array($value, ["estagiario_data_nascimento", "date_start_stage", "date_end_stage"]) && isset($_POST[$value]))
        $_POST[$value] = date("d/m/Y", strtotime($_POST[$value]));
}

$matutino = $vespertino = $noturno = "";
for ($i = 1; $i <= 6; $i++) {
    $matutino .= "
        <tr>
            <td style='padding: 4px; border: 1px solid black;'>" . $i . "ª aula</td>
            <td style='padding: 4px; border: 1px solid black;'>
                <input type='time' name='doc_matutino_segunda_" . $i . "_hora_1' id='doc_matutino_segunda_" . $i . "_hora_1' value='" . $_POST['matutino_segunda_' . $i . '_hora_1'] . "' readonly>
                <input type='time' name='doc_matutino_segunda_" . $i . "_hora_2' id='doc_matutino_segunda_" . $i . "_hora_2' value='" . $_POST['matutino_segunda_' . $i . '_hora_2'] . "' readonly>
            </td>
            <td style='padding: 4px; border: 1px solid black;'>
                <input type='time' name='doc_matutino_terca_" . $i . "_hora_1' id='doc_matutino_terca_" . $i . "_hora_1' value='" . $_POST['matutino_terca_' . $i . '_hora_1'] . "' readonly>
                <input type='time' name='doc_matutino_terca_" . $i . "_hora_2' id='doc_matutino_terca_" . $i . "_hora_2' value='" . $_POST['matutino_terca_' . $i . '_hora_2'] . "' readonly>
            </td>
            <td style='padding: 4px; border: 1px solid black;'>
                <input type='time' name='doc_matutino_quarta_" . $i . "_hora_1' id='doc_matutino_quarta_" . $i . "_hora_1' value='" . $_POST['matutino_quarta_' . $i . '_hora_1'] . "' readonly>
                <input type='time' name='doc_matutino_quarta_" . $i . "_hora_2' id='doc_matutino_quarta_" . $i . "_hora_2' value='" . $_POST['matutino_quarta_' . $i . '_hora_2'] . "' readonly>
            </td>
            <td style='padding: 4px; border: 1px solid black;'>
                <input type='time' name='doc_matutino_quinta_" . $i . "_hora_1' id='doc_matutino_quinta_" . $i . "_hora_1' value='" . $_POST['matutino_quinta_' . $i . '_hora_1'] . "' readonly>
                <input type='time' name='doc_matutino_quinta_" . $i . "_hora_2' id='doc_matutino_quinta_" . $i . "_hora_2' value='" . $_POST['matutino_quinta_' . $i . '_hora_2'] . "' readonly>
            </td>
            <td style='padding: 4px; border: 1px solid black;'>
                <input type='time' name='doc_matutino_sexta_" . $i . "_hora_1' id='doc_matutino_sexta_" . $i . "_hora_1' value='" . $_POST['matutino_sexta_' . $i . '_hora_1'] . "' readonly>
                <input type='time' name='doc_matutino_sexta_" . $i . "_hora_2' id='doc_matutino_sexta_" . $i . "_hora_2' value='" . $_POST['matutino_sexta_' . $i . '_hora_2'] . "' readonly>
            </td>
            <td style='padding: 4px; border: 1px solid black;'>
                <input type='time' name='doc_matutino_sabado_" . $i . "_hora_1' id='doc_matutino_sabado_" . $i . "_hora_1' value='" . $_POST['matutino_sabado_' . $i . '_hora_1'] . "' readonly>
                <input type='time' name='doc_matutino_sabado_" . $i . "_hora_2' id='doc_matutino_sabado_" . $i . "_hora_2' value='" . $_POST['matutino_sabado_' . $i . '_hora_2'] . "' readonly>
            </td>
            <td style='padding: 4px; border: 1px solid black;'>
                <input type='time' name='doc_matutino_domingo_" . $i . "_hora_1' id='doc_matutino_domingo_" . $i . "_hora_1' value='" . $_POST['matutino_domingo_' . $i . '_hora_1'] . "' readonly>
                <input type='time' name='doc_matutino_domingo_" . $i . "_hora_2' id='doc_matutino_domingo_" . $i . "_hora_2' value='" . $_POST['matutino_domingo_' . $i . '_hora_2'] . "' readonly>
            </td>
        </tr>
    ";
    $vespertino .= "
        <tr>
            <td style='padding: 4px; border: 1px solid black;'>" . $i . "ª aula</td>
            <td style='padding: 4px; border: 1px solid black;'>
                <input type='time' name='doc_vespertino_segunda_" . $i . "_hora_1' id='doc_vespertino_segunda_" . $i . "_hora_1' value='" . $_POST['vespertino_segunda_' . $i . '_hora_1'] . "' readonly>
                <input type='time' name='doc_vespertino_segunda_" . $i . "_hora_2' id='doc_vespertino_segunda_" . $i . "_hora_2' value='" . $_POST['vespertino_segunda_' . $i . '_hora_2'] . "' readonly>
            </td>
            <td style='padding: 4px; border: 1px solid black;'>
                <input type='time' name='doc_vespertino_terca_" . $i . "_hora_1' id='doc_vespertino_terca_" . $i . "_hora_1' value='" . $_POST['vespertino_terca_' . $i . '_hora_1'] . "' readonly>
                <input type='time' name='doc_vespertino_terca_" . $i . "_hora_2' id='doc_vespertino_terca_" . $i . "_hora_2' value='" . $_POST['vespertino_terca_' . $i . '_hora_2'] . "' readonly>
            </td>
            <td style='padding: 4px; border: 1px solid black;'>
                <input type='time' name='doc_vespertino_quarta_" . $i . "_hora_1' id='doc_vespertino_quarta_" . $i . "_hora_1' value='" . $_POST['vespertino_quarta_' . $i . '_hora_1'] . "' readonly>
                <input type='time' name='doc_vespertino_quarta_" . $i . "_hora_2' id='doc_vespertino_quarta_" . $i . "_hora_2' value='" . $_POST['vespertino_quarta_' . $i . '_hora_2'] . "' readonly>
            </td>
            <td style='padding: 4px; border: 1px solid black;'>
                <input type='time' name='doc_vespertino_quinta_" . $i . "_hora_1' id='doc_vespertino_quinta_" . $i . "_hora_1' value='" . $_POST['vespertino_quinta_' . $i . '_hora_1'] . "' readonly>
                <input type='time' name='doc_vespertino_quinta_" . $i . "_hora_2' id='doc_vespertino_quinta_" . $i . "_hora_2' value='" . $_POST['vespertino_quinta_' . $i . '_hora_2'] . "' readonly>
            </td>
            <td style='padding: 4px; border: 1px solid black;'>
                <input type='time' name='doc_vespertino_sexta_" . $i . "_hora_1' id='doc_vespertino_sexta_" . $i . "_hora_1' value='" . $_POST['vespertino_sexta_' . $i . '_hora_1'] . "' readonly>
                <input type='time' name='doc_vespertino_sexta_" . $i . "_hora_2' id='doc_vespertino_sexta_" . $i . "_hora_2' value='" . $_POST['vespertino_sexta_' . $i . '_hora_2'] . "' readonly>
            </td>
            <td style='padding: 4px; border: 1px solid black;'>
                <input type='time' name='doc_vespertino_sabado_" . $i . "_hora_1' id='doc_vespertino_sabado_" . $i . "_hora_1' value='" . $_POST['vespertino_sabado_' . $i . '_hora_1'] . "' readonly>
                <input type='time' name='doc_vespertino_sabado_" . $i . "_hora_2' id='doc_vespertino_sabado_" . $i . "_hora_2' value='" . $_POST['vespertino_sabado_' . $i . '_hora_2'] . "' readonly>
            </td>
            <td style='padding: 4px; border: 1px solid black;'>
                <input type='time' name='doc_vespertino_domingo_" . $i . "_hora_1' id='doc_vespertino_domingo_" . $i . "_hora_1' value='" . $_POST['vespertino_domingo_' . $i . '_hora_1'] . "' readonly>
                <input type='time' name='doc_vespertino_domingo_" . $i . "_hora_2' id='doc_vespertino_domingo_" . $i . "_hora_2' value='" . $_POST['vespertino_domingo_' . $i . '_hora_2'] . "' readonly>
            </td>
        </tr>
    ";
    if ($i <= 4) {
        $noturno .= "
            <tr>
                <td style='padding: 4px; border: 1px solid black;'>" . $i . "ª aula</td>
                <td style='padding: 4px; border: 1px solid black;'>
                    <input type='time' doc_name='noturno_segunda_" . $i . "_hora_1' doc_id='noturno_segunda_" . $i . "_hora_1' value='" . $_POST['noturno_segunda_' . $i . '_hora_1'] . "' readonly>
                    <input type='time' name='doc_noturno_segunda_" . $i . "_hora_2' id='doc_noturno_segunda_" . $i . "_hora_2' value='" . $_POST['noturno_segunda_' . $i . '_hora_2'] . "' readonly>
                </td>
                <td style='padding: 4px; border: 1px solid black;'>
                    <input type='time' name='doc_noturno_terca_" . $i . "_hora_1' id='doc_noturno_terca_" . $i . "_hora_1' value='" . $_POST['noturno_terca_' . $i . '_hora_1'] . "' readonly>
                    <input type='time' name='doc_noturno_terca_" . $i . "_hora_2' id='doc_noturno_terca_" . $i . "_hora_2' value='" . $_POST['noturno_terca_' . $i . '_hora_2'] . "' readonly>
                </td>
                <td style='padding: 4px; border: 1px solid black;'>
                    <input type='time' name='doc_noturno_quarta_" . $i . "_hora_1' id='doc_noturno_quarta_" . $i . "_hora_1' value='" . $_POST['noturno_quarta_' . $i . '_hora_1'] . "' readonly>
                    <input type='time' name='doc_noturno_quarta_" . $i . "_hora_2' id='doc_noturno_quarta_" . $i . "_hora_2' value='" . $_POST['noturno_quarta_' . $i . '_hora_2'] . "' readonly>
                </td>
                <td style='padding: 4px; border: 1px solid black;'>
                    <input type='time' name='doc_noturno_quinta_" . $i . "_hora_1' id='doc_noturno_quinta_" . $i . "_hora_1' value='" . $_POST['noturno_quinta_' . $i . '_hora_1'] . "' readonly>
                    <input type='time' name='doc_noturno_quinta_" . $i . "_hora_2' id='doc_noturno_quinta_" . $i . "_hora_2' value='" . $_POST['noturno_quinta_' . $i . '_hora_2'] . "' readonly>
                </td>
                <td style='padding: 4px; border: 1px solid black;'>
                    <input type='time' name='doc_noturno_sexta_" . $i . "_hora_1' id='doc_noturno_sexta_" . $i . "_hora_1' value='" . $_POST['noturno_sexta_' . $i . '_hora_1'] . "' readonly>
                    <input type='time' name='doc_noturno_sexta_" . $i . "_hora_2' id='doc_noturno_sexta_" . $i . "_hora_2' value='" . $_POST['noturno_sexta_' . $i . '_hora_2'] . "' readonly>
                </td>
                <td style='padding: 4px; border: 1px solid black;'>
                    <input type='time' name='doc_noturno_sabado_" . $i . "_hora_1' id='doc_noturno_sabado_" . $i . "_hora_1' value='" . $_POST['noturno_sabado_' . $i . '_hora_1'] . "' readonly>
                    <input type='time' name='doc_noturno_sabado_" . $i . "_hora_2' id='doc_noturno_sabado_" . $i . "_hora_2' value='" . $_POST['noturno_sabado_' . $i . '_hora_2'] . "' readonly>
                </td>
                <td style='padding: 4px; border: 1px solid black;'>
                    <input type='time' name='doc_noturno_domingo_" . $i . "_hora_1' id='doc_noturno_domingo_" . $i . "_hora_1' value='" . $_POST['noturno_domingo_' . $i . '_hora_1'] . "' readonly>
                    <input type='time' name='doc_noturno_domingo_" . $i . "_hora_2' id='doc_noturno_domingo_" . $i . "_hora_2' value='" . $_POST['noturno_domingo_' . $i . '_hora_2'] . "' readonly>
                </td>
            </tr>
        ";
    }
}

if (!isset($_POST['checkbox_matutino']) && !isset($_POST['concedente_nome']) || $_POST['checkbox_matutino']) {
$tabela_matutino = "
        <section style='width: 100%;' id='doc_table_matutino'>
            <table style='font-size: 9pt;' cellspacing='0'>
                <thead>
                    <tr>
                        <th style='padding: 4px; border: 1px solid black; text-align: center;' colspan='8'>MATUTINO</th>
                    </tr>
                    <tr>
                        <th style='padding: 4px; border: 1px solid black;'></th>
                        <th style='padding: 4px; border: 1px solid black;'>Segunda</th>
                        <th style='padding: 4px; border: 1px solid black;'>Terça</th>
                        <th style='padding: 4px; border: 1px solid black;'>Quarta</th>
                        <th style='padding: 4px; border: 1px solid black;'>Quinta</th>
                        <th style='padding: 4px; border: 1px solid black;'>Sexta</th>
                        <th style='padding: 4px; border: 1px solid black;'>Sábado</th>
                        <th style='padding: 4px; border: 1px solid black;'>Domingo</th>
                    </tr>
                </thead>
                <tbody>
                    {$matutino}
                </tbody>
            </table>
        </section>
    ";
} else {
    $tabela_matutino = "";
}

if (!isset($_POST['checkbox_vespertino']) && !isset($_POST['concedente_nome']) || $_POST['checkbox_vespertino']) {
    $tabela_vespertino = "
        <section style='width: 100%; margin: 16px 0;' id='doc_table_vespertino'>
            <table style='font-size: 9pt;' cellspacing='0'>
                <thead>
                    <tr>
                        <th style='padding: 4px; border: 1px solid black; text-align: center;' colspan='8'>VESPERTINO</th>
                    </tr>
                    <tr>
                        <th style='padding: 4px; border: 1px solid black;'></th>
                        <th style='padding: 4px; border: 1px solid black;'>Segunda</th>
                        <th style='padding: 4px; border: 1px solid black;'>Terça</th>
                        <th style='padding: 4px; border: 1px solid black;'>Quarta</th>
                        <th style='padding: 4px; border: 1px solid black;'>Quinta</th>
                        <th style='padding: 4px; border: 1px solid black;'>Sexta</th>
                        <th style='padding: 4px; border: 1px solid black;'>Sábado</th>
                        <th style='padding: 4px; border: 1px solid black;'>Domingo</th>
                    </tr>
                </thead>
                <tbody>
                    {$vespertino}
                </tbody>
            </table>
        </section>
    ";
} else {
    $tabela_vespertino = "";
}

if (!isset($_POST['checkbox_noturno']) && !isset($_POST['concedente_nome']) || $_POST['checkbox_noturno']) {
    $tabela_noturno = "
        <section style='width: 100%;' id='doc_table_noturno'>
            <table style='font-size: 9pt;' cellspacing='0'>
                <thead>
                    <tr>
                        <th style='padding: 4px; border: 1px solid black; text-align: center;' colspan='8'>NOTURNO</th>
                    </tr>
                    <tr>
                        <th style='padding: 4px; border: 1px solid black;'></th>
                        <th style='padding: 4px; border: 1px solid black;'>Segunda</th>
                        <th style='padding: 4px; border: 1px solid black;'>Terça</th>
                        <th style='padding: 4px; border: 1px solid black;'>Quarta</th>
                        <th style='padding: 4px; border: 1px solid black;'>Quinta</th>
                        <th style='padding: 4px; border: 1px solid black;'>Sexta</th>
                        <th style='padding: 4px; border: 1px solid black;'>Sábado</th>
                        <th style='padding: 4px; border: 1px solid black;'>Domingo</th>
                    </tr>
                </thead>
                <tbody>
                    {$noturno}
                </tbody>
            </table>
        </section>
    ";
} else {
    $tabela_noturno = "";
}

$cabecalho = "
    <section style='padding: 0 24px; width: 100%; margin-top: 60px;'>
        <div style='width: 100%; position: relative;'>
            <img src='{$img_campus_petrolina}' style='position: absolute; height: 40px; margin-bottom: -40px;'>
        </div>
        <div style='text-align: center;'>
            <img src='{$img_escudo_brasil}' style='height: 80px; margin-top: -40px;'>
            <p style='font-size: 12pt; margin-bottom: 0; margin-top: 4px;'><strong>MINISTÉRIO DA EDUCAÇÃO</strong></p>
            <p style='font-size: 8pt; margin: 0;'><strong>SECRETARIA DE EDUCAÇÃO PROFISSIONAL E TECNOLÓGICA</strong></p>
            <p style='font-size: 8pt; margin: 0;'><strong>INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DO SERTÃO PERNAMBUCANO</strong></p>
            <p style='font-size: 8pt; margin: 0;'><strong>CAMPUS PETROLINA – COORDENAÇÃO GERAL DE EXTENSÃO</strong></p>
        </div>
    </section>
";

$html = "
    <main>
        <meta charset='UTF-8'>

        <h5 style='font-size: 12pt; width: 100%; font-weight: bold; text-align: center; margin-top: 4px;'>TERMO DE COMPROMISSO DE ESTÁGIO OBRIGATÓRIO N° <span id='doc_documento_numero'>" . ($_POST['documento_numero'] ?? "<span style='color: red;'>N° do documento</span>") . "</span></h5>
        <section>
            <h6 style='font-size: 9.9pt; width: 100%; margin-top: 8px;'>1.CONCEDENTE</h6>
            <div style='font-size: 9.9pt; width: 100%; border: 1px solid black;'>
                <p style='font-size: 9.9pt; border-bottom: 1px solid black; padding: 4px 8px; margin: 0;'>
                    <span id='doc_concedente_nome'>" . ($_POST['concedente_nome'] ?? "<span style='color: red;'>Concedente</span>") . "</span>
                </p>
                    <p style='font-size: 9.9pt; border-bottom: 1px solid black; padding: 4px 8px; margin: 0;'>
                    CNPJ n° <span id='doc_concedente_cnpj'>" . ($_POST['concedente_cnpj'] ?? "<span style='color: red;'>CNPJ</span>") . "</span>
                </p>
                    <p style='font-size: 9.9pt; border-bottom: 1px solid black; padding: 4px 8px; margin: 0;'>
                    Natureza jurídica da instituição: <span id='doc_concedente_natureza_juridica'>" . ($_POST['concedente_natureza_juridica'] ?? "<span style='color: red;'>Natureza jurídica da instituição</span>") . "</span>
                </p>
                    <p style='font-size: 9.9pt; border-bottom: 1px solid black; padding: 4px 8px; margin: 0;'>
                    Endereço: <span id='doc_concedente_endereco'>" . ($_POST['concedente_endereco'] ?? "<span style='color: red;'>Endereço</span>") . "</span>
                </p>
                    <p style='font-size: 9.9pt; border-bottom: 1px solid black; padding: 4px 8px; margin: 0;'>
                    Representada por <span id='doc_concedente_representante'>" . ($_POST['concedente_representante'] ?? "<span style='color: red;'>Representante</span>") . "</span>
                </p>
                    <p style='font-size: 9.9pt; border-bottom: 1px solid black; padding: 4px 8px; margin: 0;'>
                    Supervisor do estágio: <span id='doc_concedente_supervisor'>" . ($_POST['concedente_supervisor'] ?? "<span style='color: red;'>Supervisor(a) do estágio</span>") . "</span>&nbsp;&nbsp;&nbsp;&nbsp; Cargo: <span id='doc_concedente_supervisor_cargo'>" . ($_POST['concedente_supervisor_cargo'] ?? "<span style='color: red;'>Cargo do(a) supervisor(a)</span>") . "</span>
                </p>
                    <p style='font-size: 9.9pt; padding: 4px 8px; margin: 0;'>
                    Formação do Supervisor: <span id='doc_concedente_supervisor_formacao' style='font-weight: bold;'>" . ($_POST['concedente_supervisor_formacao'] ?? "<span style='color: red;'>Formação do(a) supervisor(a)</span>") . "</span>
                </p>
            </div>
        </section>
        <section>
            <h6 style='font-size: 9.9pt; width: 100%; margin-top: 16px;'>2.ESTAGIÁRIO</h6>
            <div style='font-size: 9.9pt; width: 100%; border: 1px solid black;'>
                <p style='font-size: 9.9pt; border-bottom: 1px solid black; padding: 4px 8px; margin: 0;'>
                    <span id='doc_estagiario_nome' style='font-weight: bold;'>" . ($_POST['estagiario_nome'] ?? "<span style='color: red;'>Estagiário(a)</span>") . "</span>, adiante <span style='font-weight: bold;'>ESTAGIÁRIO(A)</span>
                </p>
                    <p style='font-size: 9.9pt; border-bottom: 1px solid black; padding: 4px 8px; margin: 0;'>
                    CPF n° <span id='doc_estagiario_cpf'>" . ($_POST['estagiario_cpf'] ?? "<span style='color: red;'>CPF</span>") . "</span>, RG n° <span id='doc_estagiario_rg'>" . ($_POST['estagiario_rg'] ?? "<span style='color: red;'>RG</span>") . "</span>, Órgão Expedidor: <span id='doc_estagiario_orgao_expedidor'>" . ($_POST['estagiario_orgao_expedidor'] ?? "<span style='color: red;'>Órgão Expedidor</span>") . "</span>
                </p>
                    <p style='font-size: 9.9pt; border-bottom: 1px solid black; padding: 4px 8px; margin: 0;'>
                    Data de nascimento: <span id='doc_estagiario_data_nascimento'>" . ($_POST['estagiario_data_nascimento'] ?? "<span style='color: red;'>Data de nascimento</span>") . "</span>; residente na <span id='doc_estagiario_endereco'>Endereço" . ($_POST['estagiario_endereco'] ?? "<span style='color: red;'></span>") . "</span>
                </p>
                    <p style='font-size: 9.9pt; border-bottom: 1px solid black; padding: 4px 8px; margin: 0;'>
                    E-mail: <span id='doc_estagiario_email'>" . ($_POST['estagiario_email'] ?? "<span style='color: red;'>E-mail</span>") . "</span>
                </p>
                    <p style='font-size: 9.9pt; padding: 4px 8px; margin: 0;'>
                    Curso: <span id='doc_estagiario_curso'>" . ($_POST['estagiario_curso'] ?? "<span style='color: red;'>Curso</span>") . "</span>
                </p>
            </div>
        </section>
        <section>
            <h6 style='font-size: 9.9pt; width: 100%; margin-top: 16px;'>3.INSTITUIÇÃO DE ENSINO</h6>
            <div style='font-size: 9.9pt; width: 100%; border: 1px solid black;'>
                <p style='font-size: 9.9pt; border-bottom: 1px solid black; padding: 4px 8px; margin: 0;'>
                    <span id='doc_instituicao_nome'>" . ($_POST['instituicao_nome'] ?? "<span style='color: red;'>Instituição</span>") . "</span>
                </p>
                    <p style='font-size: 9.9pt; border-bottom: 1px solid black; padding: 4px 8px; margin: 0;'>
                    CNPJ n° <span id='doc_instituicao_cnpj'>" . ($_POST['instituicao_cnpj'] ?? "<span style='color: red;'>CNPJ</span>") . "</span>
                </p>
                    <p style='font-size: 9.9pt; border-bottom: 1px solid black; padding: 4px 8px; margin: 0;'>
                    Natureza jurídica da instituição: <span id='doc_instituicao_natureza_juridica'>" . ($_POST['instituicao_natureza_juridica'] ?? "<span style='color: red;'>Natureza jurídica da instituição</span>") . "</span>
                </p>
                    <p style='font-size: 9.9pt; border-bottom: 1px solid black; padding: 4px 8px; margin: 0;'>
                    Endereço: <span id='doc_instituicao_endereco'>" . ($_POST['instituicao_endereco'] ?? "<span style='color: red;'>Endereço</span>") . "</span>
                </p>
                    <p style='font-size: 9.9pt; border-bottom: 1px solid black; padding: 4px 8px; margin: 0;'>
                    Representada por <span id='doc_instituicao_representante'>" . ($_POST['instituicao_representante'] ?? "<span style='color: red;'>Representante</span>") . "</span>
                </p>
                    <p style='font-size: 9.9pt; padding: 4px 8px; margin: 0;'>
                    Professor orientador: <span id='doc_instituicao_orientador'>" . ($_POST['instituicao_orientador'] ?? "<span style='color: red;'>Orientador(a) do estágio</span>") . "</span>
                </p>
            </div>
        </section>
        <div style='font-size: 9.9pt; margin: 16px 0;'>
            <p style='text-align: justify;'>
                As partes acima nomeadas celebram entre si este TERMO DE COMPROMISSO DE ESTÁGIO, de
                acordo com o disposto na Lei 11.788, de 25 de setembro de 2008 e legislação complementar,
                mediante as cláusulas e condições a seguir estabelecidas:
            </p>
        </div>
        <div style='font-size: 9.9pt; margin: 16px 0;'>
            <p style='text-align: justify;'>
                CLÁUSULA 1ª - DA VINCULAÇÃO AO CONVÊNIO PARA CONCESSÃO DE ESTÁGIO
                Este Termo de Compromisso vincula-se, para todos os efeitos legais, ao Convênio para Concessão
                de Estágio, celebrado entre a CONCEDENTE e a INSTITUIÇÃO DE ENSINO.
            </p>
        </div>
        <div style='font-size: 9.9pt; margin: 16px 0;'>
            <p style='text-align: justify;'>
                CLÁUSULA 2ª – DO OBJETIVO
                O presente Termo de Compromisso tem por objetivo estabelecer as normas e condições de
                realização do ESTÁGIO OBRIGATÓRIO, em consonância com o que estabelece a Lei 11.788/2008 e
                normas complementares.
            </p>
        </div>
        <div style='font-size: 9.9pt; margin: 16px 0;'>
            <p style='text-align: justify;'>
                CLÁUSULA 3ª – DO ESTAGIÁRIO
                O ESTAGIÁRIO é aluno do INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DO.
                SERTÃO PERNAMBUCANO - CAMPUS Petrolina, estando regularmente matriculado no <span id='doc_estagiario_semestre'>" . ($_POST['estagiario_semestre'] ?? "<span style='color: red;'>semestre/ano</span>") . "</span>,
                no turno da <span id='doc_estagiario_turno'>" . ($_POST['estagiario_turno'] ?? "<span style='color: red;'>Turno</span>") . "</span>, com <span id='doc_estagiario_semestre'>" . ($_POST['estagiario_aulas'] ?? "<span style='color: red;'>Aulas/expediente</span>") . "</span>.
            </p>
        </div>
        <div style='font-size: 9.9pt; margin: 16px 0;'>
            <p style='text-align: justify;'>
                CLÁUSULA 4ª - DAS CONDIÇÕES DO ESTÁGIO
                O estágio será realizado no setor de Ensino, no período de <span style='font-weight: bold;' id='doc_date_start_stage'>" . ($_POST['date_start_stage'] ?? "<span style='color: red;'>Data de início do estágio</span>") . "</span> a <span style='font-weight: bold;' id='doc_date_end_stage'>" . ($_POST['date_end_stage'] ?? "<span style='color: red;'>Data de término do estágio</span>") . "</span>, a se iniciar no
                dia da assinatura do presente, com a seguinte jornada:
            </p>
        </div>
        " . $tabela_matutino . "
        " . $tabela_vespertino . "
        " . $tabela_noturno . "
        <div style='font-size: 9.9pt; margin: 16px 0;'>
            <p style='text-align: justify;'>
                Com a carga horária de <span id='doc_estagio_horas_semanais' style='font-weight: bold;'>" . ($_POST['estagio_horas_semanais'] ?? "<span style='color: red;'>Horas semanais de estágio</span>") . "</span> semanais, perfazendo uma carga horária total de <span id='doc_estagio_horas_total' style='font-weight: bold;'>" . ($_POST['estagio_horas_total'] ?? "<span style='color: red;'>Horas de estágio total</span>") . "</span>, pois
                cada hora-aula será considerada com hora relógio dobrada de <span style='font-weight: bold;'><span id='doc_estagiario_estagio'>" . ($_POST['estagiario_estagio'] ?? "<span style='color: red;'>Estágio</span>") . "</span>, conforme o disposto na
                Cláusula 2ª, alínea “d” do Convênio para Concessão de Estágio a que se vincula este Termo
                de Compromisso.</span>
            </p>
        </div>
        <div style='font-size: 9.9pt; margin: 16px 0;'>
            <p style='text-align: justify;'>
                SUBCLÁUSULA 1ª – Em nenhuma hipótese as atividades de estágio poderão coincidir com o horário
                das aulas do ESTAGIÁRIO.
            </p>
        </div>
        <div style='font-size: 9.9pt; margin: 16px 0;'>
            <p style='text-align: justify;'>
                SUBCLÁUSULA 2ª - A jornada de atividade do estagiário poderá ser flexibilizada pela
                CONCEDENTE, desde que mantidas sua supervisão e a carga horária definida nesta cláusula.
            </p>
        </div>
        <div style='font-size: 9.9pt; margin: 16px 0;'>
            <p style='text-align: justify;'>
                SUBCLÁUSULA 3ª - A critério da CONCEDENTE poderá ser adotado o sistema de compensação de
                horas, quando compatível com a jornada de atividade definida nesta cláusula.
            </p>
        </div>
        <div style='font-size: 9.9pt; margin: 16px 0;'>
            <p style='text-align: justify;'>
                SUBCLÁUSULA 4ª – <span style='font-weight: bold;'>O estágio terá duração de <span id='doc_estagio_meses_duracao'>" . ($_POST['estagio_meses_duracao'] ?? "<span style='color: red;'>Meses de duração do estágio</span>") . "</span> e <span id='doc_estagio_dias_duracao'>" . ($_POST['estagio_dias_duracao'] ?? "<span style='color: red;'>Dias de duração do estágio</span>") . "</span>, podendo ser
                prorrogado sucessivamente por igual período até o máximo de 2 (dois) anos, à exceção para
                estagiário portador de deficiência.</span>
            </p>
        </div>
        <div style='font-size: 9.9pt; margin: 16px 0;'>
            <p style='text-align: justify;'>
                CLÁUSULA 5ª – DO PLANO DE ATIVIDADES
            </p>
            <p style='text-align: justify;'>
                Integra o presente para todos os efeitos legais o PLANO DE ATIVIDADES do estágio, elaborado em
                conjunto pelo ESTAGIÁRIO, pela INSTITUIÇÃO DE ENSINO e pela CONCEDENTE, onde deverão
                constar as condições de adequação do estágio à proposta pedagógica do curso, à etapa e
                modalidade da formação escolar do estudante e ao horário e calendário escolar, bem como indicação
                nominal do professor orientador da área objeto de desenvolvimento, a quem caberá avaliar o
                desempenho do estudante estagiário.
            </p>
        </div>
        <div style='font-size: 9.9pt; margin: 16px 0;'>
            <p style='text-align: justify;'>
                CLÁUSULA 6ª – DAS OBRIGAÇÕES E RESPONSABILIDADES DA CONCEDENTE
            </p>
            <p style='text-align: justify;'>
                A CONCEDENTE deverá:
            </p>
            <p style='text-align: justify;'>
                - liberar o ESTAGIÁRIO, por ocasião das reuniões de acompanhamento, visitas técnicas e aulas
                práticas que forem oficializadas pela INSTITUIÇÃO DE ENSINO, bem como a redução da carga
                horária do estágio, pelo menos à metade, nos períodos de avaliação de aprendizagem, programados
                no calendário escolar;
                - manter as instalações com condições de proporcionar ao ESTAGIÁRIO atividades de aprendizagem
                social, profissional e cultural;
                - respeitar o limite máximo legal de 10 estagiários por SUPERVISOR;
                - enviar à INSTITUIÇÃO DE ENSINO, semestralmente, relatório de atividades do estágio, com vista
                obrigatória do ESTAGIÁRIO.
                - disponibilizar ao ESTAGIÁRIO os equipamentos de segurança que se fizerem necessário e exigir o
                seu uso durante o desempenho das atividades do estágio;
                - não expor o ESTAGIÁRIO a riscos ambientais insalubres ou perigosos, sem o uso dos EPI’s e
                EPC’s obrigatórios, dentro dos limites de tolerância;
                - informar ao ESTAGIÁRIO todas as normas de Segurança do Trabalho previstas para seu estágio;
                - entregar quando do desligamento do ESTAGIÁRIO, termo de realização do estágio, com indicação
                resumida das atividades desenvolvidas, dos períodos e da avaliação de desempenho.
            </p>
        </div>
        <div style='font-size: 9.9pt; margin: 16px 0;'>
            <p style='text-align: justify;'>
                CLÁUSULA 7ª – DAS OBRIGAÇÕES E RESPONSABILIDADES DA INSTITUIÇÃO DE ENSINO
            </p>
            <p style='text-align: justify;'>
                A INSTITUIÇÃO DE ENSINO se compromete a colaborar com a CONCEDENTE e com o
                ESTAGIÁRIO para que a realização do estágio atinja os seus objetivos acadêmicos e ocorra em
                observância aos dispositivos legais e regulamentares pertinentes, devendo para tanto:
                - avaliar as instalações do local em que será realizado o estágio e sua adequação à formação cultural
                e profissional do ESTAGIÁRIO;
                - exigir do ESTAGIÁRIO a apresentação semestral ao Professor Orientador do relatório de atividades;
                - zelar pelo cumprimento deste termo de compromisso, reorientando o ESTAGIÁRIO para outro local
                em caso de descumprimento de suas normas;
                - comunicar à CONCEDENTE o início do período letivo e a datas de realização de avaliações
                escolares ou acadêmicas;
                - comunicar à CONCEDENTE o desligamento do ESTAGIÁRIO da INSTITUIÇÃO DE ENSINO.
            </p>
        </div>
        <div style='font-size: 9.9pt; margin: 16px 0;'>
            <p style='text-align: justify;'>
                CLÁUSULA 8ª – DAS OBRIGAÇÕES E RESPONSABILIDADES DO ESTAGIÁRIO
            </p>
        </div>
        <div style='font-size: 9.9pt; margin: 16px 0;'>
            <p style='text-align: justify;'>
                O ESTAGIÁRIO deverá:
                a) atuar com zelo e dedicação na execução de suas atribuições, de forma a evidenciar desempenho
                satisfatório nas avaliações periódicas a serem realizadas pelo Supervisor do estágio;
                b) cumprir fielmente todas as instruções, recomendações de normas relativas ao estágio emanadas
                da Instituição de Ensino e da CONCEDENTE, em especial as constantes do Plano de Estágio;
                c) manter total reserva em relação a quaisquer dados ou informações a que venha a ter acesso em
                razão de sua atuação no cumprimento do estágio, não as repassando a terceiros sob qualquer forma
                ou pretexto, sem prévia autorização formal da CONCEDENTE independentemente de se tratar ou
                não de informação reservada, confidencial ou sigilosa;
                d) Preencher e assinar a proposta de seguro de acidentes pessoais referente ao Plano de Seguro
                Contra Acidentes de Trabalho no ato da celebração deste instrumento;
                e) responsabilizar-se por qualquer dano ou prejuízo que venha a causar ao patrimônio da
                CONCEDENTE por dolo ou culpa;
                f) manter conduta compatível com a ética, os bons costumes e a probidade administrativa no
                desenvolvimento do estágio, evitando a prática de atos que caracterizem falta grave.
            </p>
        </div>
        <div style='font-size: 9.9pt; margin: 16px 0;'>
            <p style='text-align: justify;'>
                CLÁUSULA 9ª – DO RECESSO
            </p>
            <p style='text-align: justify;'>
                Conforme o disposto no Art. 13, da Lei 11.788/2008, É assegurado ao estagiário, sempre que o
                estágio tenha duração igual ou superior a 1 (um) ano, período de recesso de 30 (trinta) dias, a ser
                gozado preferencialmente durante suas férias escolares.
                § 1° O recesso de que trata este artigo deverá ser remunerado quando o estagiário receber
                bolsa ou outra forma de contraprestação.
                § 2° Os dias de recesso previstos neste artigo serão concedidos de maneira proporcional, nos
                casos de o estágio ter duração inferior a 1 (um) ano.
            </p>
            <p style='text-align: justify;'>
                Subcláusula 1ª - A proporcionalidade de que trata o §2° do art. 13 da Lei n.° 11.788/2008, será
                calculada à razão de dois dias e meio por mês completo de estágio, devendo ser arredondado o total
                dos dias apurados para o número inteiro subsequente, e caso haja período de menos de um mês
                cheio, os dias de recesso desse mês serão calculados, considerando-se mês cheio, caso estagiário
                permaneça por 15 (quinze) dias ou mais, ou, permanecendo período menor que 15 (quinze) dias,
                esse período não deverá ser considerado para cálculo da proporcionalidade.
            </p>
        </div>
        <div style='font-size: 9.9pt; margin: 16px 0;'>
            <p style='text-align: justify;'>
                CLÁUSULA 10ª – DO SEGURO CONTRA ACIDENTES PESSOAIS<br>
                O ESTAGIÁRIO encontra-se assegurado contra acidentes pessoais, através da RENOVAÇÃO DE
                APÓLICE n° <span style='font-weight: bold;'>2002630</span> - Seguradora <span style='font-weight: bold;'>SURA S/A</span>, tendo com ESTIPULANTE a <span style='font-weight: bold;'>INSTITUIÇÃO DE
                ENSINO</span>, nas condições e valores fixados na referida APÓLICE, compatíveis com os valores de
                mercado.
            </p>
        </div>
        <div style='font-size: 9.9pt; margin: 16px 0;'>
            <p style='text-align: justify;'>
                CLÁUSULA 11ª – DO VÍNCULO EMPREGATÍCIO
                Conforme o previsto na legislação vigente, o estágio não gera vínculo empregatício de qualquer
                natureza, desde que observados os incisos do Art. 3° da Lei 11.788/2008 e as obrigações contidas no
                presente Convênio, independentemente da concessão de benefícios relacionados à transporte,
                alimentação e saúde, ressalvado o disposto sobre a matéria na legislação previdenciária e no Art. 15
                da Lei 11.788/2008 e nem haverá, por parte da CONCEDENTE, qualquer compromisso em
                estabelecer futuramente tal vínculo.
            </p>
            <p style='text-align: justify;'>
                SUBCLÁUSULA 1ª – É vedada qualquer espécie de cobrança ou desconto pelo agente de integração
                na bolsa estágio.
            </p>
        </div>
        <div style='font-size: 9.9pt; margin: 16px 0;'>
            <p style='text-align: justify;'>
                CLAÚSULA 12ª – DA EXTINÇÃO DO ESTÁGIO
                O estágio será extinto;
                - por iniciativa de quaisquer das partes, mediante comunicação por escrito feita com antecedência
                mínima de cinco (05) dias, respeitando-se o período de recesso;
                - por decurso do prazo fixado para o estágio, sem que tenha sido prorrogado mediante Termo Aditivo
                ao presente;
                - na hipótese do ESTAGIÁRIO ser desvinculado da INSTITUIÇÃO DE ENSINO
            </p>
        </div>
        <div style='font-size: 9.9pt; margin: 16px 0;'>
            <p style='text-align: justify;'>
                E por estarem de acordo, firmam as partes o presente Termo de Compromisso em três vias de igual
                teor para um só efeito, na presença das testemunhas abaixo nomeadas e assinadas.
            </p>
        </div>
        <div style='font-size: 9.9pt; margin: 16px 0;'>
            <p style='text-align: right;'>
                <span id='doc_documento_cidade_uf'>" . ($_POST['documento_cidade_uf'] ?? "<span style='color: red;'>Cidade-UF</span>") . "</span>, <span id='doc_documento_dia'>" . ($_POST['documento_dia'] ?? "<span style='color: red;'>Dia</span>") . "</span> de <span id='doc_documento_mes'>" . ($_POST['documento_mes'] ?? "<span style='color: red;'>Mês</span>") . "</span> de <span id='doc_documento_ano'>" . ($_POST['documento_ano'] ?? "<span style='color: red;'>Ano</span>") . "</span>.
            </p>
        </div>
        <table>
            <tr>
                <td style='font-size: 9.9pt; width: 50%; text-align: center; padding: 40px 5%;' valign='top'>
                    <hr style='margin-bottom: 4px;'>
                    <p style='text-align: center; margin: 0;' id='doc_documento_supervisor_nome'>" . ($_POST['documento_supervisor_nome'] ?? "<span style='color: red;'>Supervisor(a)</span>") . "</p>
                    <p style='text-align: center; margin: 0;'>Nome e assinatura do(a) Supervisor(a)</p>
                </td>
                <td style='font-size: 9.9pt; width: 50%; text-align: center; padding: 40px 5%;' valign='top'>
                    <hr style='margin-bottom: 4px;'>
                    <p style='text-align: center; margin: 0;' id='doc_documento_diretor_nome'>" . ($_POST['documento_diretor_nome'] ?? "<span style='color: red;'>Diretor(a)</span>") . "</p>
                    <p style='text-align: center; margin: 0; font-weight: bold;'>IF Sertão Pernambucano Diretor(a) Geral do Campus Petrolina</p>
                </td>
            </tr>
        </table>
        <div style='font-size: 9.9pt; text-align: center; padding: 40px;'>
            <hr style='margin-bottom: 4px;'>
            <p style='text-align: center; margin: 0;' class='doc_estagiario_nome'>" . ($_POST['estagiario_nome'] ?? "<span style='color: red;'>Estagiário(a)</span>") . "</p>
            <p style='text-align: center; margin: 0;'>Nome e assinatura do(a) Estagiário(a)</p>
        </div>
    </main>
";

$rodape = "
    <section style='padding: 0 24px; text-align: center; font-size: 6.9pt; width: 100%;'>
        <p style='margin: 0;'>Instituto Federal de Educação, Ciência e Tecnologia do Sertão Pernambucano – Campus Petrolina</p>
        <p style='margin: 0;'>Rua Maria Luiza de Araújo Gomes Cabral, S/N, João de Deus</p>
        <p style='margin: 0;'>CEP: 56316-686– Petrolina-PE | Fone: (87) 2101-4320</p>
        <p style='margin: 0;'><a href='https://www.ifsertao-pe.edu.br/' target='_blank'>www.ifsertao-pe.edu.br</a> | <a href='https://cp.cgex@ifsertao-pe.edu.br' target='_blank'>cp.cgex@ifsertao-pe.edu.br</a></p>
    </section>
";
