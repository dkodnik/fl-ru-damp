<div class="tabs-in nr-tabs-in2">
    <form action="." method="post" id="draftFrm">
        <div class="nr-tbl-drafts">
            <div>
                <table>
                    <col width="40" />
                    <col width="410" />
                    <col width="80" />
                    <col width="150" />
                    <col width="100" />
                    <col width="150" />
                    <thead>
                        <tr>
                            <th></th>
                            <th>������</th>
                            <th></th>
                            <th>�����������</th>
                            <th>������</th>
                            <th>����</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="form">
                <b class="b1"></b>
                <b class="b2"></b>
                <div class="form-in">
                    <table>
                        <col width="40" />
                        <col width="410" />
                        <col width="80" />
                        <col width="150" />
                        <col width="100" />
                        <col width="150" />
                        <tbody>
                            <? $i=0; foreach($sbr_drafts as $id=>$curr_sbr) { ?>
                            <tr<?=(++$i==$sbr_count ? ' class="last"' : '')?>>
                                <th><input type="checkbox" name="id[]" value="<?=$id?>" onclick="SBR.selectDraft(this, <?=(int)$curr_sbr->checkSendReady()?>)" /></th>
                                <td><a href="?site=edit&id=<?=$id?>"><?=reformat($curr_sbr->data['name'],38,0,1)?></a></td>
                                <td>������: <?=$curr_sbr->data['stages_cnt']?></td>
                                <td>
                                  <? if($curr_sbr->data['frl_login']) { ?>
                                    <a href="/users/<?=$curr_sbr->data['frl_login']?>/" class="nr-draft-user"><?=($curr_sbr->data['frl_uname'].' '.$curr_sbr->data['frl_usurname'].' ['.$curr_sbr->data['frl_login'].']')?></a>
                                  <? } else { ?>�� ������<? } ?>
                                </td>
                                <td>
                                  <? if($curr_sbr->data['cost']) { ?>
                                    <?=sbr_meta::view_cost($curr_sbr->data['cost'], $curr_sbr->cost_sys)?>
                                  <? } else { echo ($curr_sbr->data['cost'] ? '�� ���������' : '�� �����'); } ?>
                                </td>
                                <td>
                                  <? if($curr_sbr->data['work_days']) { ?>
                                    <?=$curr_sbr->data['work_days'].'&nbsp;'.ending($curr_sbr->data['work_days'], '����', '���', '����')?>
                                  <? } else { echo ($curr_sbr->data['work_days'] ? '�� ���������' : '�� ������'); } ?>
                                </td>
                            </tr>
                            <? } ?>
                        </tbody>
                    </table>
                </div>
                <b class="b2"></b>
                <b class="b1"></b>
            </div>
        </div>
        <div class="form nr-draft-imp">
            <b class="b1"></b>
            <b class="b2"></b>
            <div class="form-in">
                ����� ��������� ������ �� ����������� ���������� ���������� �����������, ����������� �������, � ����� ����� � ������ �� ���� ������� �������.
            </div>
            <b class="b2"></b>
            <b class="b1"></b>
        </div>
        <div class="nr-drafts-btns">
            ���������� 
            <input type="submit" name="send" value="��������� ����������� �� �����������" class="i-btn nr-draft-send" disabled="true" />
            <input type="submit" name="delete" value="�������" class="i-btn nr-draft-del" disabled="true" onclick="return window.confirm('�� ������������� ������ ������� ������?')" />
        </div>
        <input type="hidden" name="site" value="<?=$site?>" />
        <input type="hidden" name="action" value="multiset" />
    </form>
</div>
<script type="text/javascript">
var SBR = new Sbr('draftFrm');
</script>
