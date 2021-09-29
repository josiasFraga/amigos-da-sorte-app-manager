<?php foreach($dados as $key => $curriculo): ?>
<div class="row">
    <div style="width: 34%;" class="col bgblue">
        <div class="photo">
            <div class="avatar" style="background-image:url(<?php echo $curriculo['Curriculo']['curriculo_foto'] ?>)"></div>
        </div>
        <br><br>
        <br><br>
        <div class="contato-container">
            <h2>Contato</h2>
            <table>
                <tbody>
                    <tr>
                        <td class="white">Telefone: </td>
                        <td class="white"><?= $curriculo['Curriculo']['curriculo_telefone'] ?></td>
                    </tr>
                    <tr>
                        <td class="white">Celular: </td>
                        <td class="white"><?= $curriculo['Curriculo']['curriculo_celular'] ?></td>
                    </tr>
                    <tr>
                        <td class="white">Email: </td>
                        <td class="white"><?= $curriculo['Curriculo']['curriculo_email'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br><br>
        <br><br>
        <div class="contato-container">
            <h2>Referências Profissionais</h2>
            <?php if ( $curriculo['Curriculo']['curriculo_experiencia'] == 1): ?>
            <table>
                <tbody>
                    <tr>
                        <td class="white">Empresa: </td>
                        <td class="white"><?= $curriculo['Curriculo']['curriculo_ultEmpresaNome1'] ?></td>
                    </tr>
                    <tr>
                        <td class="white">Cargo: </td>
                        <td class="white"><?= $curriculo['Curriculo']['curriculo_ultEmpresaCargo1'] ?></td>
                    </tr>
                    <tr>
                        <td class="white">Contato: </td>
                        <td class="white"><?= $curriculo['Curriculo']['curriculo_ultEmpresaNContato1'] ?></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <?php else: ?>
                Não possui
            <?php endif; ?>
            <?php if ( $curriculo['Curriculo']['curriculo_experiencia'] == 1 && $curriculo['Curriculo']['curriculo_ultEmpresaNome2'] != '' ): ?>
            <table>
                <tbody>
                    <tr>
                        <td class="white">Empresa: </td>
                        <td class="white"><?= $curriculo['Curriculo']['curriculo_ultEmpresaNome2'] ?></td>
                    </tr>
                    <tr>
                        <td class="white">Cargo: </td>
                        <td class="white"><?= $curriculo['Curriculo']['curriculo_ultEmpresaCargo2'] ?></td>
                    </tr>
                    <tr>
                        <td class="white">Contato: </td>
                        <td class="white"><?= $curriculo['Curriculo']['curriculo_ultEmpresaNContato2'] ?></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <?php endif; ?>
            <?php if ( $curriculo['Curriculo']['curriculo_experiencia'] == 1 && $curriculo['Curriculo']['curriculo_ultEmpresaNome3'] != ''): ?>
            <table>
                <tbody>
                    <tr>
                        <td class="white">Empresa: </td>
                        <td class="white"><?= $curriculo['Curriculo']['curriculo_ultEmpresaNome3'] ?></td>
                    </tr>
                    <tr>
                        <td class="white">Cargo: </td>
                        <td class="white"><?= $curriculo['Curriculo']['curriculo_ultEmpresaCargo3'] ?></td>
                    </tr>
                    <tr>
                        <td class="white">Contato: </td>
                        <td class="white"><?= $curriculo['Curriculo']['curriculo_ultEmpresaNContato3'] ?></td>
                    </tr>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>

    <div style="width: 63%; padding-left: 1%; padding-right: 1%; padding-top: 0.5%" class="col">
        <h1 style="margin-bottom: 10px; padding-bottom: 0"><?= $curriculo['Curriculo']['curriculo_nome'] ?></h1>
        <hr style="background-color:#4a4a9b" />

        <h3>Dados Pessoais</h3>
        <table class="show-info">
            <tbody>
            <tr>
                <td>
                    <span class="small bold">Nacionalidade: </span>
                    <span class="upper"><?= $curriculo['Curriculo']['curriculo_nacionalidade'] == 1 ? 'Brasileiro(a)' : 'Uruguaio(a)'; ?></span>
                </td>
                <td class="space"></td>
                <td>
                    <span class="small bold">Sexo: </span>
                    <span class="upper"><?= $curriculo['Sexo']['titulo'] ?></span>
                </td>
            </tr>
            <?php if ($curriculo['Curriculo']['curriculo_nacionalidade'] == 1):  ?>
            <tr>
                <td>
                    <span class="small bold">CPF: </span>
                    <span class="upper"><?= $curriculo['Curriculo']['curriculo_cpf'] ?></span>
                </td>
                <td class="space"></td>
                <td>
                    <span class="small bold">RG: </span>
                    <span class="upper"><?= $curriculo['Curriculo']['curriculo_rg'] ?></span>
                </td>
            </tr>
            <?php else: ?>
            <tr>
                <td>
                    <span class="small bold">CI: </span>
                    <span class="upper"><?= $curriculo['Curriculo']['curriculo_ci'] ?></span>
                </td>
                <td class="space"></td>
                <td>
                    <span class="small bold">Dependentes: </span>
                    <span class="upper"><?= $curriculo['Curriculo']['curriculo_dependentes'] == 1 ? $curriculo['Curriculo']['curriculo_dependentes_n'] : '0'; ?></span>
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <td>
                    <span class="small bold">Nascimento: </span>
                    <span class="upper"><?= date('d/m/Y',strtotime($curriculo['Curriculo']['curriculo_dataNascimento'])) ?> (<?= $curriculo['Curriculo']['idade'] ?> Anos)</span>
                </td>
                <td class="space"></td>
                <td>
                    <span class="small bold">Estado Civil: </span>
                    <span class="upper"><?= $curriculo['EstadoCivil']['estCivil_desc'] ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="small bold">Mãe: </span>
                    <span class="upper"><?= $curriculo['Curriculo']['curriculo_mae'] ?></span>
                </td>
                <td class="space"></td>
                <td>
                    <span class="small bold">Habilitação: </span>
                    <span class="upper"><?= $curriculo['Habilitacao']['nome'] ?></span>
                </td>
            </tr>
            <?php if ($curriculo['Curriculo']['curriculo_nacionalidade'] == 1 && ($curriculo['Curriculo']['curriculo_pis'] != '' || $curriculo['Curriculo']['curriculo_ctps'] != '') ):  ?>
            <tr>
                <td>
                    <span class="small bold">Pis: </span>
                    <span class="upper"><?= $curriculo['Curriculo']['curriculo_pis'] ?></span>
                </td>
                <td class="space"></td>
                <td>
                    <span class="small bold">CTPS: </span>
                    <span class="upper"><?= $curriculo['Curriculo']['curriculo_ctps'] ?></span>
                </td>
            </tr>
            <?php endif; ?>
            <?php if ($curriculo['Curriculo']['curriculo_nacionalidade'] == 1):  ?>
            <tr>
                <td>
                    <span class="small bold">Dependentes: </span>
                    <span class="upper"><?= $curriculo['Curriculo']['curriculo_dependentes'] == 1 ? $curriculo['Curriculo']['curriculo_dependentes_n'] : '0'; ?></span>
                </td>
                <td class="space"></td>
                <td>
                </td>
            </tr>
            <?php endif; ?>

            </tbody>
        </table>
        <br>

        <h3>Endereço</h3>
        <table class="show-info">
            <tbody>
            <tr>
                <td>
                    <span class="small bold">Pais: </span>
                    <span class="upper"><?= $curriculo['PaisEndereco']['pais_nome']; ?></span>
                </td>
                <td class="space"></td>
                <td>
                    <span class="small bold">UF: </span>
                    <span class="upper"><?= $curriculo['Curriculo']['curriculo_estado'].$curriculo['Departamento']['uruDep_nome'] ?></span>
                </td>
            </tr>
           
            <tr>
                <td>
                    <span class="small bold">Cidade: </span>
                    <span class="upper"><?= $curriculo['Curriculo']['curriculo_cidade'].$curriculo['DepartamentoLocalidade']['usuCid_nome'] ?></span>
                </td>
                <td class="space"></td>
                <td>
                    <span class="small bold">Bairro: </span>
                    <span class="upper"><?= $curriculo['Curriculo']['curriculo_bairro'] ?></span>
                </td>
            </tr>
           
           <tr>
               <td clspan="2">
                   <span class="small bold">Edenreço: </span>
                   <span class="upper"><?= $curriculo['Curriculo']['curriculo_endereco'] ?> - <?= $curriculo['Curriculo']['curriculo_cep'] ?></span>
               </td>
           </tr>


            </tbody>
        </table>
        <br>

        <h3>Formação</h3>
        <table class="show-info">
            <tbody>
            <tr>
                <td colspan="2">
                    <span class="small bold">Escolaridade: </span>
                    <span class="upper"><?= $curriculo['Escolaridade']['escolaridades_descricao']; ?></span>
                </td>
            </tr>
            <?php if ( $curriculo['Curriculo']['curriculo_escolaridade'] == 5 || $curriculo['Curriculo']['curriculo_escolaridade'] == 6 || $curriculo['Curriculo']['curriculo_escolaridade'] == 7 || $curriculo['Curriculo']['curriculo_escolaridade'] == 8 ) : ?>
           
           <tr>
               <td>
                   <span class="small bold">Nome do Curso<?= $curriculo['Curriculo']['curriculo_escolaridade'] != 5 ? ' Superior' : ''; ?>: </span>
                   <span class="upper"><?= $curriculo['Curriculo']['curriculo_curso'] ?></span>
               </td>
               <td class="space"></td>
               <td>
                   <span class="small bold">Nome do Curso de Pós: </span>
                   <span class="upper"><?= $curriculo['Curriculo']['curriculo_curso_pos'] ?></span>
               </td>
           </tr>
            <?php endif; ?>
            <tr>
                <td colspan="3">
                    <span class="small bold">Conhecimentos em informática: </span>
                    <span class="upper"><?= $curriculo['Curriculo']['conhecimentos_info'] ?></span>
                </td>    
            </tr>
            <tr>
                <td colspan="3">
                    <span class="small bold">Idiomas: </span>
                    <span class="upper"><?= $curriculo['Curriculo']['conhecimentos_idiomas'] ?></span>
                </td>    
            </tr>
            </tbody>
        </table>

        <?php if ( $curriculo['Curriculo']['curriculo_curso_1'] != '' || $curriculo['Curriculo']['curriculo_curso_2'] != '' || $curriculo['Curriculo']['curriculo_curso_3'] != '') : ?>
        <h5 class="">Cursos Realizados</h5>
        <table class="show-info">
            <tbody>

            <?php if ( $curriculo['Curriculo']['curriculo_curso_1'] != '' ) : ?>
           
           <tr>
               <td>
                   <span class="small bold">Curso: </span><br>
                   <span class="upper"><?= $curriculo['Curriculo']['curriculo_curso_1'] ?></span>
               </td>
               <td class="space"></td>
               <td>
                   <span class="small bold">Escola: </span><br>
                   <span class="upper"><?= $curriculo['Curriculo']['curriculo_curso_escola_1'] ?></span>
               </td>
               <td class="space"></td>
               <td>
                   <span class="small bold">Escola: </span><br>
                   <span class="upper"><?= $curriculo['Curriculo']['curriculo_curso_certificado_1'] ?></span>
               </td>
           </tr>
            <?php endif; ?>

            <?php if ( $curriculo['Curriculo']['curriculo_curso_2'] != '' ) : ?>

            <tr>
            <td>
                <span class="small bold">Curso: </span><br>
                <span class="upper"><?= $curriculo['Curriculo']['curriculo_curso_2'] ?></span>
            </td>
            <td class="space"></td>
            <td>
                <span class="small bold">Escola: </span><br>
                <span class="upper"><?= $curriculo['Curriculo']['curriculo_curso_escola_2'] ?></span>
            </td>
            <td class="space"></td>
            <td>
                <span class="small bold">Escola: </span><br>
                <span class="upper"><?= $curriculo['Curriculo']['curriculo_curso_certificado_2'] ?></span>
            </td>
            </tr>
            <?php endif; ?>

            <?php if ( $curriculo['Curriculo']['curriculo_curso_3'] != '' ) : ?>

            <tr>
            <td>
                <span class="small bold">Curso: </span><br>
                <span class="upper"><?= $curriculo['Curriculo']['curriculo_curso_3'] ?></span>
            </td>
            <td class="space"></td>
            <td>
                <span class="small bold">Escola: </span><br>
                <span class="upper"><?= $curriculo['Curriculo']['curriculo_curso_escola_3'] ?></span>
            </td>
            <td class="space"></td>
            <td>
                <span class="small bold">Escola: </span><br>
                <span class="upper"><?= $curriculo['Curriculo']['curriculo_curso_certificado_3'] ?></span>
            </td>
            </tr>
            <?php endif; ?>
            </tbody>
        </table>
        <?php endif; ?>

        <?php if ( $curriculo['Curriculo']['curriculo_outrasAtividades'] != '' ): ?>
        <h5 class="">Outras Atividades</h5>
        <table class="show-info">
            <tbody>

                <tr>
                    <td><?= $curriculo['Curriculo']['curriculo_outrasAtividades'] ?></td>
                </tr>
                
            </tbody>
        </table>
        <?php endif; ?>

        <?php if ( $curriculo['Curriculo']['curriculo_projetosSociais'] == 1 ): ?>
        <h5 class="">Projetos Sociais</h5>
        <table class="show-info">
            <tbody>

                <tr>
                    <td><?= $curriculo['Curriculo']['curriculo_projetosQuais'] ?></td>
                </tr>
                
            </tbody>
        </table>
        <?php endif; ?>
        <br>

        <h3>Preferências</h3>
        <table class="show-info">
            <tbody>
            <tr>
                <td>
                    <span class="small bold">Pais: </span>
                    <span class="upper"><?= $curriculo['PaisPreferencia']['pais_nome']; ?></span>
                </td>
                <td class="space"></td>
                <td>
                    <span class="small bold">UF: </span>
                    <span class="upper"><?= $curriculo['Curriculo']['curriculo_estadoDesejado'].$curriculo['DepartamentoDesejado']['uruDep_nome'] ?></span>
                </td>
            </tr>
           
            <tr>
                <td>
                    <span class="small bold">Cidade: </span>
                    <span class="upper"><?= $curriculo['LocalidadePreferencia']['loc_no'].$curriculo['DepartamentoLocalidadeDesejada']['usuCid_nome'] ?></span>
                </td>
                <td class="space"></td>
                <td>
                    <span class="small bold">Empresa: </span>
                    <span class="upper"><?= $curriculo['Cliente']['cliente_fantasia'] != null ? $curriculo['Cliente']['cliente_fantasia'] : 'Sem Preferência'; ?></span>
                </td>
            </tr>
           
            <tr>
                <td>
                    <span class="small bold">Disponibilidade de horários: </span>
                    <span class="upper"><?= $curriculo['Curriculo']['curriculo_horario_disponibilidade'] ?></span>
                </td>
                <td class="space"></td>
                <td>
                    <span class="small bold">Uniforme/Tamanho: </span>
                    <span class="upper"><?= $curriculo['Curriculo']['curriculo_uniforme_tamanho'] ?></span>
                </td>
            </tr>

            <tr>
                <td colspan="3">
                    <span class="small bold">Objetivos Profissionais: </span>
                    <span class="upper"><?= nl2br($curriculo['Curriculo']['curriculo_objetivos']) ?></span>
                </td>
            </tr>


            </tbody>
        </table>

    </div>
</div>
<?php if ($key+1 < count($dados)): ?>
<pagebreak>
<?php endif; ?>
<?php endforeach; ?>
