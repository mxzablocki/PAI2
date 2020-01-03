<input type="button" name="shownotify" id="shownotify" value="Pokaż powiadomienie" />

<div class="admin_panel">
	<div id="content">
		<div class="tabs">
			<a href="?id=lista&strona=wszystkie"><input type="button" value="Lista tematów"></a>
		</div>
		<? if( $_SESSION['rights'] == 1){ ?>
		<div class="tabs">
			<a href="?id=personel&strona=lista_osob"><input type="button" value="Nowy temat"></a>
		</div>
		<div class="tabs">
			<a href="?id=lista&strona=otwarte"><input type="button" value="Zakończ temat"></a>
		</div>
		<? } ?>
		<div class="tabs">
			<a href="?id=lista&strona=wszystkie&zakonczony=1"><input type="button" value="Zakończone tematy"></a>
		</div>
		<? /*<div class="tabs last">
			<a href="#"><input type="button" value="Wyloguj"></a>
		</div>*/?>
	</div>
</div>
<div class="admin_panel_bottom">Aktywne Tematy</div>
<? if( $_SESSION['rights'] == 1){ ?>
<div class="admin_panel">
	<div id="content">
		<div class="tabs">
			<a href="?id=personel&strona=lista_osob"><input type="button" value="Lista osób"></a>
		</div>
		<div class="tabs">
			<a href="?id=personel&strona=osoba_dodaj"><input type="button" value="Dodaj osobę"></a>
		</div>
		<div class="tabs">
			<a href="?id=personel&strona=osoba_modyfikuj"><input type="button" value="Modyfikuj osobę"></a>
		</div>
		<div class="tabs last">
			<a href="?id=personel&strona=osoba_usun"><input type="button" value="Usuń osobę"></a>
		</div>
	</div>
	<hr style="margin-bottom:0px;">
	<div id="content">
		<div class="tabs">
			<a href="?id=firmy&strona=lista_firm"><input type="button" value="Lista oddziałów"></a>
		</div>
		<div class="tabs">
			<a href="?id=firmy&strona=firma_dodaj"><input type="button" value="Dodaj oddział"></a>
		</div>
		<div class="tabs">
			<a href="?id=firmy&strona=firma_modyfikuj"><input type="button" value="Modyfikuj oddział"></a>
		</div>
		<div class="tabs last">
			<a href="?id=firmy&strona=firma_usun"><input type="button" value="Usuń oddział"></a>
		</div>
	</div>
</div>
<div class="admin_panel_bottom">Lista osób oraz oddziałów</div>
<? } ?>
<div class="admin_panel">
	<div id="content">
		<div class="tabs last">
			<a href="?id=id&strona=logout"><input type="button" value="Wyloguj"></a>
		</div>
	</div>
</div>
<div class="admin_panel_bottom">Operacje</div>
