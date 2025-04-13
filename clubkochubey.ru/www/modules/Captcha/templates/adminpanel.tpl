<!-- Start Template adminpanel.tpl //-->
{foreach from=$errors item=err}
{$err}
{/foreach}
{foreach from=$messages item=msg}
{$msg}
{/foreach}
<div class="adminform">
{$tabheaders.start}
{foreach from=$tabheaders.tabheaders item=tabheader}
{$tabheader}
{/foreach}
{$tabheaders.end}

{$start_tab_content}

{foreach from=$tabs item=tab}
{$tab->start}
{$tab->content}
{$tab->end}
{/foreach}

{$tab_footers}
</div>
<!-- End Template adminpanel.tpl //-->
