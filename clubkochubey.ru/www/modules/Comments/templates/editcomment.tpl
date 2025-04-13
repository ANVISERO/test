{$startform}
	<div class="pageoverflow">
		<p class="pagetext">{$titletext}:</p>
		<p class="pageinput">{$inputtitle}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">*{$authortext}:</p>
		<p class="pageinput">{$inputauthor}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">*{$datatext}:</p>
		<p class="pageinput">{$inputdata}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$activetext}:</p>
		<p class="pageinput">{$inputactive}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$emailtext}:</p>
		<p class="pageinput">{$inputemail}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$notifytext}:</p>
		<p class="pageinput">{$inputnotify}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$websitetext}:</p>
		<p class="pageinput">{$inputwebsite}</p>
	</div>
	{if $modulename == ''}
	<div class="pageoverflow">
		<p class="pagetext">{$pageidtext}:</p>
		<p class="pageinput">{$inputpageid}</p>
	</div>
	{else}
	<div class="pageoverflow">
		<p class="pagetext">{$modulenametext}:</p>
		<p class="pageinput">{$modulename}</p>
	</div>
	{/if}
	<div class="pageoverflow">
		<p class="pagetext">{$postdatetext}:</p>
		<p class="pageinput">{$inputpostdate}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$createdatetext}:</p>
		<p class="pageinput">{$inputcreatedate}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$modifydatetext}:</p>
		<p class="pageinput">{$inputmodifydate}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">{$iptext}:</p>
		<p class="pageinput">{$inputip}</p>
	</div>
	<div class="pageoverflow">
		<p class="pagetext">&nbsp;</p>
		<p class="pageinput">{$hidden}{$submit}{$cancel}</p>
	</div>
{$endform}
