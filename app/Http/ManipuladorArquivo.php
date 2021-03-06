<?php
/**
 * Created by PhpStorm.
 * User: Wilder
 * Date: 01/04/2017
 * Time: 10:51
 */

namespace eeducar\Http;


class ManipuladorArquivo
{
    /** M�todo que salva arquivo no servidor
     * @param $arquivo \Symfony\Component\HttpFoundation\File\UploadedFile arquivo a ser salvo
     * @param $pasta string nome da pasta em que arquivo dever� ser salvo
     * @param $nome string nome do arquivo (sem extens�o)
     * @return null|string caminho do arquivo ou null se arquivo n�o tiver sido passado
     */
    public static function salvar($arquivo, $pasta, $nome)
    {
        if ($arquivo):                                              //Se arquivo passado n�o for nulo
            $nome .= '.' . $arquivo->getClientOriginalExtension();  //Acrescenta ao nome do arquivo sua extens�o
            $diretorio = 'arquivos/' . $pasta;                      //Define o local onde arquivo ser� salvo
            $arquivo->move($diretorio, $nome);                      //Salva arquivo
            return $diretorio . '/' . $nome;                        //Retorna o caminho do arquivo
        endif;
        return null;
    }
    /** M�todo que exclui arquivo
     * @param $arquivo string caminho para arquivo a ser exclu�do
     */
    public static function excluir($arquivo)
    {
        if ($arquivo != null && file_exists($arquivo)):             //Se caminho de arquivo n�o for nulo e arquivo existir
            unlink($arquivo);                                       //Apaga arquivo
        endif;
    }
}