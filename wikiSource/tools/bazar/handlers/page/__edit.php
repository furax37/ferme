<?php
/*
$Id: __edit.php,v 1.1 2010-06-02 08:48:51 mrflos Exp $
Copyright (c) 2010, Florian Schmitt <florian@outils-reseaux.org>
All rights reserved.
Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions
are met:
1. Redistributions of source code must retain the above copyright
notice, this list of conditions and the following disclaimer.
2. Redistributions in binary form must reproduce the above copyright
notice, this list of conditions and the following disclaimer in the
documentation and/or other materials provided with the distribution.
3. The name of the author may not be used to endorse or promote products
derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE AUTHOR ``AS IS'' AND ANY EXPRESS OR
IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES
OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT,
INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT
NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF
THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/

// V?rification de s?curit?
if (!defined("WIKINI_VERSION")) {
    die ("acc&egrave;s direct interdit");
}

if ($this->HasAccess('write')) {
    $type = $this->GetTripleValue($this->GetPageTag(), 'http://outils-reseaux.org/_vocabulary/type', '', '');
    if ($type == 'fiche_bazar') {
        //dans le cas ou on vient de modifier dans le formulaire une fiche bazar, on enregistre les modifications
        if (isset($_POST['bf_titre'])) {
            $GLOBALS['_BAZAR_']['id_fiche'] = $this->GetPageTag();
            $tab_nature = baz_valeurs_type_de_fiche($_POST['id_typeannonce']);
            $GLOBALS['_BAZAR_']['id_typeannonce']=$tab_nature['bn_id_nature'];
            $GLOBALS['_BAZAR_']['typeannonce']=$tab_nature['bn_label_nature'];
            $GLOBALS['_BAZAR_']['condition']=$tab_nature['bn_condition'];
            $GLOBALS['_BAZAR_']['template']=$tab_nature['bn_template'];
            $GLOBALS['_BAZAR_']['commentaire']=$tab_nature['bn_commentaire'];
            $GLOBALS['_BAZAR_']['appropriation']=$tab_nature['bn_appropriation'];
            $GLOBALS['_BAZAR_']['class']=$tab_nature['bn_label_class'];
            baz_formulaire(BAZ_ACTION_MODIFIER_V);
            $this->Redirect($this->Href());
        } else {
            $page = $this->LoadPage($this->GetPageTag());
            $tab_valeurs = json_decode( $page['body'], true);
            $tab_valeurs = array_map('utf8_decode', $tab_valeurs);
            $GLOBALS['_BAZAR_']['id_fiche'] = $tab_valeurs['id_fiche'];
            $tab_nature = baz_valeurs_type_de_fiche($tab_valeurs['id_typeannonce']);
            $GLOBALS['_BAZAR_']['id_typeannonce']=$tab_nature['bn_id_nature'];
            $GLOBALS['_BAZAR_']['typeannonce']=$tab_nature['bn_label_nature'];
            $GLOBALS['_BAZAR_']['condition']=$tab_nature['bn_condition'];
            $GLOBALS['_BAZAR_']['template']=$tab_nature['bn_template'];
            $GLOBALS['_BAZAR_']['commentaire']=$tab_nature['bn_commentaire'];
            $GLOBALS['_BAZAR_']['appropriation']=$tab_nature['bn_appropriation'];
            $GLOBALS['_BAZAR_']['class']=$tab_nature['bn_label_class'];
            $pageeditionfiche = baz_formulaire(BAZ_ACTION_MODIFIER, $this->href('edit'), $tab_valeurs);
        }
    }
}
