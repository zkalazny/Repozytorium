{extends file="main.tpl"}

{block name=footer}Przykładowa treść stopki kalkulatora kredytowego{/block}

{block name=content}

<h3>Prosty kalkulator kredytowy</h2>


<form class="pure-form pure-form-stacked" action="{$conf->action_root}calcCompute" method="post">
	<fieldset>
		<label for="x">Kwota:</label>
		<input id="x" type="text" placeholder="wartość x" name="x" value="{$form->x}">
		<label for="op">Oprocentowanie:</label>
		<input id="op" type="text" placeholder="wartość op" name="op" value="{$form->op}">	
					
		<label for="y">Ilość lat:</label>
		<input id="y" type="text" placeholder="wartość y" name="y" value="{$form->y}">
	</fieldset>
	<button type="submit" class="pure-button pure-button-primary">Oblicz</button>
</form>

<div class="messages">


{if $msgs->isError()}
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	{foreach $msgs->getErrors() as $err}
	{strip}
		<li>{$err}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}


{if $msgs->isInfo()}
	<h4>Powiadomienia: </h4>
	<ol class="inf">
	{foreach $msgs->getInfos() as $inf}
	{strip}
		<li>{$inf}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{if isset($res->result)}
	<h4>Wynik obliczeń</h4>
	<p class="res">
	{$res->result}
	</p>
{/if}

</div>

{/block}