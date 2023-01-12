<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SG-Estágio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <?php date_default_timezone_set('America/Sao_Paulo'); // Seta o fuso-horário de Brasília 
    ?>
    <!-- jsPDF -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script> -->
    <style>
        .overflow-auto {
            height: 720px;
        }

        @media screen and (max-width: 756px) {
            .overflow-auto {
                height: 400px;
            }
        }
    </style>
</head>

<body>
    <div class="container pb-3">
        <div class="col-12">
            <h3 class="title text-center my-2">GERAR DOCUMENTO</h3>
        </div>

        <div class="d-flex justify-content-start p-0 my-3">
            <a class="btn btn-outline-secondary" href="index.php">Voltar</a>
        </div>

        <div class="d-flex flex-wrap">
            <div class="col-12 col-md-6 pe-md-4">
                <div class="d-flex flex-wrap gap-2 justify-content-center my-2" id="formulario">
                    <form class="w-100" action="models/documento.php" method="post" id="exportar_documento_pdf">
                        <!-- Inputs com informação a serem inseridas no documento -->
                        <div class="p-3 border border-1 rounded overflow-auto shadow">
                            <div class="d-flex flex-wrap gap-2 border border-1 rounded p-3">
                                <h5>Dados do concedente</h5>
                                <div class="w-100">
                                    <label>Concedente:</label>
                                    <input class="form-control" type="text" name="concedente_nome" id="concedente_nome" placeholder="Nome da instituição" value="INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DO SERTÃO PERNAMBUCANO - CAMPUS Petrolina, adiante INSTITUIÇÃO DE ENSINO">
                                </div>
                                <div class="w-100">
                                    <label>CNPJ:</label>
                                    <input class="form-control" type="text" name="concedente_cnpj" id="concedente_cnpj" placeholder="" value="10.830.301/0003-68">
                                </div>
                                <div class="w-100">
                                    <label>Natureza jurídica da instituição:</label>
                                    <input class="form-control" type="text" name="concedente_natureza_juridica" id="concedente_natureza_juridica" placeholder="" value="Autarquia Federal vinculada ao Ministério da Educação">
                                </div>
                                <div class="w-100">
                                    <label>Endereço:</label>
                                    <input class="form-control" type="text" name="concedente_endereco" id="concedente_endereco" placeholder="Rua, número, bairro, cidade/UF, cep, telefone" value="Rua Maria Luzia de Araújo Gomes Cabral, n° 791, João de Deus, CEP. 56.316-686 Petrolina/PE, Telefone ( 87 ) 2101-4300">
                                </div>
                                <div class="w-100">
                                    <label>Representante:</label>
                                    <input class="form-control" type="text" name="concedente_representante" id="concedente_representante" placeholder="Representação da instituição" value="Representada por Fabiano de Almeida Marinho Diretor Geral do Campus Petrolina, nomeado pela Portaria D.O.U N° 187/2020 de 03 de março de 2020, Identidade n° 1373249 – SSP/PB, CPF n° 692346204-53">
                                </div>
                                <div class="w-100">
                                    <label>Supervisor(a) do estágio:</label>
                                    <input class="form-control" type="text" name="concedente_supervisor" id="concedente_supervisor" placeholder="Responsável da instituição por supervisionar o estagiário" value="">
                                </div>
                                <div class="w-100">
                                    <label>Cargo do(a) supervisor(a):</label>
                                    <input class="form-control" type="text" name="concedente_supervisor_cargo" id="concedente_supervisor_cargo" placeholder="Área de atuação do supervisor do estágio" value="">
                                </div>
                                <div class="w-100">
                                    <label>Formação do(a) supervisor(a):</label>
                                    <input class="form-control" type="text" name="concedente_supervisor_formacao" id="concedente_supervisor_formacao" placeholder="Graduação do supervisor do estágio" value="">
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="d-flex flex-wrap gap-2 border border-1 rounded p-3">
                                <h5>Dados do estagiário</h5>
                                <div class="w-100">
                                    <label>Estagiário(a):</label>
                                    <input class="form-control" type="text" name="estagiario_nome" id="estagiario_nome" placeholder="Nome completo do(a) estagiário(a)" value="">
                                </div>
                                <div class="w-100">
                                    <label>CPF:</label>
                                    <input class="form-control" type="text" name="estagiario_cpf" id="estagiario_cpf" placeholder="" value="">
                                </div>
                                <div class="w-100">
                                    <label>RG:</label>
                                    <input class="form-control" type="text" name="estagiario_rg" id="estagiario_rg" placeholder="" value="">
                                </div>
                                <div class="w-100">
                                    <label>Órgão expedidor:</label>
                                    <input class="form-control" type="text" name="estagiario_orgao_expedidor" id="estagiario_orgao_expedidor" placeholder="Órgao expedidor do CPF" value="">
                                </div>
                                <div class="w-100">
                                    <label>Data de nascimento:</label>
                                    <input class="form-control" type="date" name="estagiario_data_nascimento" id="estagiario_data_nascimento" placeholder="" value="">
                                </div>
                                <div class="w-100">
                                    <label>Endereço:</label>
                                    <input class="form-control" type="text" name="estagiario_endereco" id="estagiario_endereco" placeholder="Rua, número, bairro, cidade/UF, cep, telefone" value="">
                                </div>
                                <div class="w-100">
                                    <label>E-mail:</label>
                                    <input class="form-control" type="text" name="estagiario_email" id="estagiario_email" placeholder="" value="">
                                </div>
                                <div class="w-100">
                                    <label>Curso:</label>
                                    <input class="form-control" type="text" name="estagiario_curso" id="estagiario_curso" placeholder="Ex: Licenciatura em Computação" value="">
                                </div>
                                <div class="w-100">
                                    <label>Semestre/ano:</label>
                                    <input class="form-control" type="text" name="estagiario_semestre" id="estagiario_semestre" placeholder="Ex: 8° semestre" value="">
                                </div>
                                <div class="w-100">
                                    <label>Turno:</label>
                                    <input class="form-control" type="text" name="estagiario_turno" id="estagiario_turno" placeholder="Ex: manhã" value="">
                                </div>
                                <div class="w-100">
                                    <label>Aulas/expediente:</label>
                                    <input class="form-control" type="text" name="estagiario_aulas" id="estagiario_aulas" placeholder="Ex: aulas na quinta das 07:30 às 09:00 horas; e no turno da tarde, com aulas: segunda e quarta das 16:45 às 18: 15 horas" value="">
                                </div>
                                <div class="w-100">
                                    <label>Estágio:</label>
                                    <input class="form-control" type="text" name="estagiario_estagio" id="estagiario_estagio" placeholder="Ex: Estágio 4" value="">
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="d-flex flex-wrap gap-2 border border-1 rounded p-3">
                                <h5>Instituição de ensino</h5>
                                <div class="w-100">
                                    <label>Instituição:</label>
                                    <input class="form-control" type="text" name="instituicao_nome" id="instituicao_nome" placeholder="" value="INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DO SERTÃO PERNAMBUCANO - CAMPUS Petrolina, adiante INSTITUIÇÃO DE ENSINO">
                                </div>
                                <div class="w-100">
                                    <label>CNPJ:</label>
                                    <input class="form-control" type="text" name="instituicao_cnpj" id="instituicao_cnpj" placeholder="" value="10.830.301/0003-68">
                                </div>
                                <div class="w-100">
                                    <label>Natureza jurídica da instituição:</label>
                                    <input class="form-control" type="text" name="instituicao_natureza_juridica" id="instituicao_natureza_juridica" placeholder="" value="Autarquia Federal vinculada ao Ministério da Educação">
                                </div>
                                <div class="w-100">
                                    <label>Endereço:</label>
                                    <input class="form-control" type="text" name="instituicao_endereco" id="instituicao_endereco" placeholder="Rua, número, bairro, cidade/UF, cep, telefone" value="Rua Maria Luzia de Araújo Gomes Cabral, n° 791, João de Deus, CEP. 56.316-686 Petrolina/PE, Telefone ( 87 ) 2101-4300">
                                </div>
                                <div class="w-100">
                                    <label>Representante:</label>
                                    <input class="form-control" type="text" name="instituicao_representante" id="instituicao_representante" placeholder="Representação da instituição" value="Representada por Fabiano de Almeida Marinho Diretor Geral do Campus Petrolina, nomeado pela Portaria D.O.U N° 187/2020 de 03 de março de 2020, Identidade n° 1373249 – SSP/PB, CPF n° 692346204-53">
                                </div>
                                <div class="w-100">
                                    <label>Orientador(a) do estágio:</label>
                                    <input class="form-control" type="text" name="instituicao_orientador" id="instituicao_orientador" placeholder="Responsável da instituição por supervisionar o estagiário" value="">
                                </div>
                            </div>

                            <hr class="my-4">

                            <!-- Inputs com informação vindas da página de cálculo de horas a serem inseridas no documento -->
                            <div class="d-flex flex-wrap gap-2 border border-1 rounded p-3">
                                <h5>Dados do estágio:</h5>
                                <div class="w-100">
                                    <label>Data de início do estágio:</label>
                                    <input class="form-control" type="date" name="date_start_stage" id="date_start_stage" placeholder="" value="<?= $_GET['date_start_stage'] ?? '' ?>">
                                </div>
                                <div class="w-100">
                                    <label>Data de término do estágio:</label>
                                    <input class="form-control" type="date" name="date_end_stage" id="date_end_stage" placeholder="" value="<?= implode('-', array_reverse(explode('/', $_GET['date_end_stage']))) ?? '' ?>">
                                </div>
                                <div class="w-100">
                                    <label>Horas semanais de estágio:</label>
                                    <input class="form-control" type="text" name="estagio_horas_semanais" id="estagio_horas_semanais" placeholder="Ex: 04 horas" value="<?= $_GET['quantidade_horas_semanais'] ?? '' ?>">
                                </div>
                                <div class="w-100">
                                    <label>Horas de estágio total:</label>
                                    <input class="form-control" type="text" name="estagio_horas_total" id="estagio_horas_total" placeholder="Horas do estágio dobrada para curso superior" value="<?= $_GET['quantidade_horas_estagio_dobrado'] ?? '' ?>">
                                </div>
                                <div class="w-100">
                                    <label>Meses de duração do estágio:</label>
                                    <input class="form-control" type="text" name="estagio_meses_duracao" id="estagio_meses_duracao" placeholder="Ex: 03 (três) meses" value="<?= $_GET['estagio_meses_duracao'] ?? '' ?>">
                                </div>
                                <div class="w-100">
                                    <label>Dias de duração do estágio:</label>
                                    <input class="form-control" type="text" name="estagio_dias_duracao" id="estagio_dias_duracao" placeholder="Ex: 18 (dezoito) dias" value="<?= $_GET['estagio_dias_duracao'] ?? '' ?>">
                                </div>
                                <div class="w-100 overflow-auto h-auto">
                                    <table class="table table-bordered" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th colspan="8" class="text-center">MATUTINO</th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th>Segunda</th>
                                                <th>Terça</th>
                                                <th>Quarta</th>
                                                <th>Quinta</th>
                                                <th>Sexta</th>
                                                <th>Sábado</th>
                                                <th>Domingo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 1; $i <= 6; $i++) { ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td>
                                                        <input type="time" name="matutino_segunda_<?= $i ?>_hora_1" id="matutino_segunda_<?= $i ?>_hora_1">
                                                        <input type="time" name="matutino_segunda_<?= $i ?>_hora_2" id="matutino_segunda_<?= $i ?>_hora_2">
                                                    </td>
                                                    <td>
                                                        <input type="time" name="matutino_terca_<?= $i ?>_hora_1" id="matutino_terca_<?= $i ?>_hora_1">
                                                        <input type="time" name="matutino_terca_<?= $i ?>_hora_2" id="matutino_terca_<?= $i ?>_hora_2">
                                                    </td>
                                                    <td>
                                                        <input type="time" name="matutino_quarta_<?= $i ?>_hora_1" id="matutino_quarta_<?= $i ?>_hora_1">
                                                        <input type="time" name="matutino_quarta_<?= $i ?>_hora_2" id="matutino_quarta_<?= $i ?>_hora_2">
                                                    </td>
                                                    <td>
                                                        <input type="time" name="matutino_quinta_<?= $i ?>_hora_1" id="matutino_quinta_<?= $i ?>_hora_1">
                                                        <input type="time" name="matutino_quinta_<?= $i ?>_hora_2" id="matutino_quinta_<?= $i ?>_hora_2">
                                                    </td>
                                                    <td>
                                                        <input type="time" name="matutino_sexta_<?= $i ?>_hora_1" id="matutino_sexta_<?= $i ?>_hora_1">
                                                        <input type="time" name="matutino_sexta_<?= $i ?>_hora_2" id="matutino_sexta_<?= $i ?>_hora_2">
                                                    </td>
                                                    <td>
                                                        <input type="time" name="matutino_sabado_<?= $i ?>_hora_1" id="matutino_sabado_<?= $i ?>_hora_1">
                                                        <input type="time" name="matutino_sabado_<?= $i ?>_hora_2" id="matutino_sabado_<?= $i ?>_hora_2">
                                                    </td>
                                                    <td>
                                                        <input type="time" name="matutino_domingo_<?= $i ?>_hora_1" id="matutino_domingo_<?= $i ?>_hora_1">
                                                        <input type="time" name="matutino_domingo_<?= $i ?>_hora_2" id="matutino_domingo_<?= $i ?>_hora_2">
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="w-100 overflow-auto h-auto">
                                    <table class="table table-bordered" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th colspan="8" class="text-center">VESPERTINO</th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th>Segunda</th>
                                                <th>Terça</th>
                                                <th>Quarta</th>
                                                <th>Quinta</th>
                                                <th>Sexta</th>
                                                <th>Sábado</th>
                                                <th>Domingo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 1; $i <= 6; $i++) { ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td>
                                                        <input type="time" name="vespertino_segunda_<?= $i ?>_hora_1" id="vespertino_segunda_<?= $i ?>_hora_1">
                                                        <input type="time" name="vespertino_segunda_<?= $i ?>_hora_2" id="vespertino_segunda_<?= $i ?>_hora_2">
                                                    </td>
                                                    <td>
                                                        <input type="time" name="vespertino_terca_<?= $i ?>_hora_1" id="vespertino_terca_<?= $i ?>_hora_1">
                                                        <input type="time" name="vespertino_terca_<?= $i ?>_hora_2" id="vespertino_terca_<?= $i ?>_hora_2">
                                                    </td>
                                                    <td>
                                                        <input type="time" name="vespertino_quarta_<?= $i ?>_hora_1" id="vespertino_quarta_<?= $i ?>_hora_1">
                                                        <input type="time" name="vespertino_quarta_<?= $i ?>_hora_2" id="vespertino_quarta_<?= $i ?>_hora_2">
                                                    </td>
                                                    <td>
                                                        <input type="time" name="vespertino_quinta_<?= $i ?>_hora_1" id="vespertino_quinta_<?= $i ?>_hora_1">
                                                        <input type="time" name="vespertino_quinta_<?= $i ?>_hora_2" id="vespertino_quinta_<?= $i ?>_hora_2">
                                                    </td>
                                                    <td>
                                                        <input type="time" name="vespertino_sexta_<?= $i ?>_hora_1" id="vespertino_sexta_<?= $i ?>_hora_1">
                                                        <input type="time" name="vespertino_sexta_<?= $i ?>_hora_2" id="vespertino_sexta_<?= $i ?>_hora_2">
                                                    </td>
                                                    <td>
                                                        <input type="time" name="vespertino_sabado_<?= $i ?>_hora_1" id="vespertino_sabado_<?= $i ?>_hora_1">
                                                        <input type="time" name="vespertino_sabado_<?= $i ?>_hora_2" id="vespertino_sabado_<?= $i ?>_hora_2">
                                                    </td>
                                                    <td>
                                                        <input type="time" name="vespertino_domingo_<?= $i ?>_hora_1" id="vespertino_domingo_<?= $i ?>_hora_1">
                                                        <input type="time" name="vespertino_domingo_<?= $i ?>_hora_2" id="vespertino_domingo_<?= $i ?>_hora_2">
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="w-100 overflow-auto h-auto">
                                    <table class="table table-bordered" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th colspan="8" class="text-center">NOTURNO</th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th>Segunda</th>
                                                <th>Terça</th>
                                                <th>Quarta</th>
                                                <th>Quinta</th>
                                                <th>Sexta</th>
                                                <th>Sábado</th>
                                                <th>Domingo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 1; $i <= 6; $i++) { ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td>
                                                        <input type="time" name="noturno_segunda_<?= $i ?>_hora_1" id="noturno_segunda_<?= $i ?>_hora_1">
                                                        <input type="time" name="noturno_segunda_<?= $i ?>_hora_2" id="noturno_segunda_<?= $i ?>_hora_2">
                                                    </td>
                                                    <td>
                                                        <input type="time" name="noturno_terca_<?= $i ?>_hora_1" id="noturno_terca_<?= $i ?>_hora_1">
                                                        <input type="time" name="noturno_terca_<?= $i ?>_hora_2" id="noturno_terca_<?= $i ?>_hora_2">
                                                    </td>
                                                    <td>
                                                        <input type="time" name="noturno_quarta_<?= $i ?>_hora_1" id="noturno_quarta_<?= $i ?>_hora_1">
                                                        <input type="time" name="noturno_quarta_<?= $i ?>_hora_2" id="noturno_quarta_<?= $i ?>_hora_2">
                                                    </td>
                                                    <td>
                                                        <input type="time" name="noturno_quinta_<?= $i ?>_hora_1" id="noturno_quinta_<?= $i ?>_hora_1">
                                                        <input type="time" name="noturno_quinta_<?= $i ?>_hora_2" id="noturno_quinta_<?= $i ?>_hora_2">
                                                    </td>
                                                    <td>
                                                        <input type="time" name="noturno_sexta_<?= $i ?>_hora_1" id="noturno_sexta_<?= $i ?>_hora_1">
                                                        <input type="time" name="noturno_sexta_<?= $i ?>_hora_2" id="noturno_sexta_<?= $i ?>_hora_2">
                                                    </td>
                                                    <td>
                                                        <input type="time" name="noturno_sabado_<?= $i ?>_hora_1" id="noturno_sabado_<?= $i ?>_hora_1">
                                                        <input type="time" name="noturno_sabado_<?= $i ?>_hora_2" id="noturno_sabado_<?= $i ?>_hora_2">
                                                    </td>
                                                    <td>
                                                        <input type="time" name="noturno_domingo_<?= $i ?>_hora_1" id="noturno_domingo_<?= $i ?>_hora_1">
                                                        <input type="time" name="noturno_domingo_<?= $i ?>_hora_2" id="noturno_domingo_<?= $i ?>_hora_2">
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="d-flex flex-wrap gap-2 border border-1 rounded p-3">
                                <h5>Dados do documento:</h5>
                                <div class="w-100">
                                    <label>N° do documento:</label>
                                    <input class="form-control" type="text" name="documento_numero" id="documento_numero" placeholder="Ex: 191/2022" value="">
                                </div>
                                <div class="w-100">
                                    <label>Cidade-UF:</label>
                                    <input class="form-control" type="text" name="documento_cidade_uf" id="documento_cidade_uf" placeholder="" value="Petrolina-PE">
                                </div>
                                <div class="w-100">
                                    <label>Dia:</label>
                                    <input class="form-control" type="number" name="documento_dia" id="documento_dia" placeholder="Escrita em numeral" value="">
                                </div>
                                <div class="w-100">
                                    <label>Mês:</label>
                                    <input class="form-control" type="text" name="documento_mes" id="documento_mes" placeholder="Escrita por extenso" value="">
                                </div>
                                <div class="w-100">
                                    <label>Ano:</label>
                                    <input class="form-control" type="number" name="documento_ano" id="documento_ano" placeholder="Escrita em numeral" value="<?= date("Y") ?>">
                                </div>
                                <div class="w-100">
                                    <label>Supervisor(a):</label>
                                    <input class="form-control" type="text" name="documento_supervisor_nome" id="documento_supervisor_nome" placeholder="Nome completo do(a) supervisor(a)" value="">
                                </div>
                                <div class="w-100">
                                    <label>Diretor(a):</label>
                                    <input class="form-control" type="text" name="documento_diretor_nome" id="documento_diretor_nome" placeholder="Nome completo do(a) diretor(a) do Campus" value="">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 justify-content-end py-4">
                            <button class="btn btn-outline-dark" type="button" onclick="downloadDoc()">Exportar DOCX</button>
                            <button class="btn btn-outline-info" type="submit" name="exportar_documento_pdf">Exportar PDF</button>
                        </div>
                    </form>
                    <form class="d-none" action="models/documento.php" method="post" id="exportar_documento_doc">
                        <input type="hidden" name="exportar_documento_doc">
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-6 ps-md-4">
                <div class="d-flex flex-wrap gap-2 justify-content-center my-2 border border-1 rounded overflow-auto shadow" id="previa_documento">
                    <!-- <iframe src="components/documento.php" width="100%"></iframe> -->
                    <?php
                    $img_campus_petrolina = "assets/img/campus_petrolina.png";
                    $img_escudo_brasil = "assets/img/escudo_brasil.png";

                    include("components/documento.php");

                    echo "<div style='padding: 4px 12px;'>";
                    echo $cabecalho;
                    echo $html;
                    echo $rodape;
                    echo "</div>";
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
        function downloadDoc() {
            $("#exportar_documento_doc").submit();
        }

        // Atribuir os dados dos inputs na prévia de vizualização do documento
        $(() => {
            var campos = [
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

            var table = [];
            for (let index = 1; index <= 6; index++) {
                table.push("matutino_segunda_" + index + "_hora_1");
                table.push("matutino_segunda_" + index + "_hora_2");

                table.push("matutino_terca_" + index + "_hora_1");
                table.push("matutino_terca_" + index + "_hora_2");

                table.push("matutino_quarta_" + index + "_hora_1");
                table.push("matutino_quarta_" + index + "_hora_2");

                table.push("matutino_quinta_" + index + "_hora_1");
                table.push("matutino_quinta_" + index + "_hora_2");

                table.push("matutino_sexta_" + index + "_hora_1");
                table.push("matutino_sexta_" + index + "_hora_2");

                table.push("matutino_sabado_" + index + "_hora_1");
                table.push("matutino_sabado_" + index + "_hora_2");

                table.push("matutino_domingo_" + index + "_hora_1");
                table.push("matutino_domingo_" + index + "_hora_2");


                table.push("vespertino_segunda_" + index + "_hora_1");
                table.push("vespertino_segunda_" + index + "_hora_2");

                table.push("vespertino_terca_" + index + "_hora_1");
                table.push("vespertino_terca_" + index + "_hora_2");

                table.push("vespertino_quarta_" + index + "_hora_1");
                table.push("vespertino_quarta_" + index + "_hora_2");

                table.push("vespertino_quinta_" + index + "_hora_1");
                table.push("vespertino_quinta_" + index + "_hora_2");

                table.push("vespertino_sexta_" + index + "_hora_1");
                table.push("vespertino_sexta_" + index + "_hora_2");

                table.push("vespertino_sabado_" + index + "_hora_1");
                table.push("vespertino_sabado_" + index + "_hora_2");

                table.push("vespertino_domingo_" + index + "_hora_1");
                table.push("vespertino_domingo_" + index + "_hora_2");


                table.push("noturno_segunda_" + index + "_hora_1");
                table.push("noturno_segunda_" + index + "_hora_2");

                table.push("noturno_terca_" + index + "_hora_1");
                table.push("noturno_terca_" + index + "_hora_2");

                table.push("noturno_quarta_" + index + "_hora_1");
                table.push("noturno_quarta_" + index + "_hora_2");

                table.push("noturno_quinta_" + index + "_hora_1");
                table.push("noturno_quinta_" + index + "_hora_2");

                table.push("noturno_sexta_" + index + "_hora_1");
                table.push("noturno_sexta_" + index + "_hora_2");

                table.push("noturno_sabado_" + index + "_hora_1");
                table.push("noturno_sabado_" + index + "_hora_2");

                table.push("noturno_domingo_" + index + "_hora_1");
                table.push("noturno_domingo_" + index + "_hora_2");
            }

            var value;

            function validaDatas(element) {
                if (element == "estagiario_data_nascimento" || element == "date_start_stage" || element == "date_end_stage") {
                    var data = new Date();
                    value = data.toLocaleDateString("pt-BR", {
                        day: "2-digit",
                        month: "2-digit",
                        year: "numeric"
                    });
                } else
                    value = $("#" + element).val();
            }
            campos.forEach(element => {
                if ($("#" + element).val() != "") { // Atualiza os valores ao carregar a página
                    validaDatas(element);

                    $("#doc_" + element).html(value);
                }

                $("#" + element).on("change", function() { // Atualiza os valores ao alterar os campos
                    validaDatas(element);

                    $("#doc_" + element).html(value);
                });
            });

            table.forEach(element => {
                if ($("#" + element).val() != "")
                    $("#doc_" + element).val($("#" + element).val());

                $("#" + element).on("change", function() {
                    $("#doc_" + element).val($("#" + element).val());
                });
            });



            // var templateHTML = document.querySelector("main");

            // var doc = new jsPDF();
            // doc.html(templateHTML, {
            //     callback: function(doc) {
            //         // Obter o conteúdo do documento em formato base64
            //         var base64 = doc.output('datauristring');
            //         // Atribuir o conteúdo ao atributo src da tag iframe
            //         document.querySelector('meu-iframe').src = 'data:application/pdf;base64,' + base64;
            //     }
            // });

            // var doc = new jsPDF();
            // doc.addHTML(document.querySelector("main"), function() {
            //     doc.save('document.pdf');
            // });

            // var doc = new jsPDF();
            // doc.text(20, 20, 'Hello World!');
            // doc.addPage();
            // doc.text(20, 20, 'Page 2');
            // doc.save('document.pdf');
        });
    </script>
</body>

</html>