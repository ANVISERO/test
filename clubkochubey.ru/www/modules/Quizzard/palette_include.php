<style>
#characterpalette {
	position: fixed;
	top: 15px;
	right: 5px;
	background-color: #fff;
	border: 1px solid black;
	width: 200px;
}
#characterpalette table {
	width: 80%;
	padding: 0 5px 0 5px;
}
#characterpalette table td {
    border: 1px solid black;
    text-align: center;
    width: 1em;
    padding: 2px;
}
#characterpalette td a {
    display: block;
    background-color: #eee;
    width: 100%;
    text-decoration: none;
}
#characterpalette td a:hover {
    background-color: #bbf;
}

#palettelink {
	position: absolute;
	right: 5px;
	top: 2px;
	text-decoration: none;
	padding: 0;
}
#palettehandle {
	padding: 0 10px 0 0;
	text-align: center;
	background-color: #ccc;
    border: 1px solid blue;
    cursor : move;
}
</style>
<div id="characterpalette">
<h3 id="palettehandle"><?php
echo $this->Lang('character_palette');
?></h3><a id="palettelink" href="javascript:palette()">^</a>
<div id="characters" style="display: block"><table>
<?php
$counter = 0;
$show_char = $this->GetPreference('show_char_list',
'00000000000000000000000000000111111111111111111111111111111');
for ($i=0;$i<count($accented);$i++)
    {
    if ($show_char[$i] == '1')
        {
        if ($counter % 5 == 0)
            {
            echo "<tr>";
            }
        echo '<td><a href="javascript:insertAtCaret(\''.$accented[$i].'\')"> ';
        echo $accented[$i].' </a></td>';
        $counter++;
        if ($counter == 5)
            {
            $counter = 0;
            echo '</tr>';
            }
        }
        }
if ($counter != 0)
    {
    while ($counter < 5)
        {
        echo '<td></td>';
        $counter++;
        }
    echo '</tr>';
    }
?>
</table>
</div>
</div>
<script type="text/javascript">

var focusedFormControl = '';
var dragok = false;
var y,x,dy,dx;
var pal, palhand;


if (document.getElementsByTagName) onload = function ()
	{
	var e, i = 0;
	while (e = document.getElementsByTagName ('INPUT')[i++])
		{
		if (e.type == 'text') e.onfocus = function ()
			{
			focusedFormControl = this;
			}
		if (e.type == 'text' && document.all) e.onclick = function() {setCaret(this);}
		if (e.type == 'text' && document.all) e.onkeyup = function() {setCaret(this);}
		}
	}

function palette()
	{
	var pal = document.getElementById('characters');
	var lnk = document.getElementById('palettelink');
	if (pal && pal != null)
		{
		if (pal.style.display == null || pal.style.display == 'block')
			{
			pal.style.display = 'none';
			lnk.innerHTML = 'V';
			}
		else
			{
			pal.style.display = 'block';
			lnk.innerHTML = '^';
			}
		}

	}

function setCaret(textObj)
	{
	if (textObj.createTextRange)
		{
		textObj.caretPos = document.selection.createRange().duplicate();
		}
	}
	
function insertAtCaret(textFieldValue)
	{
	if (! focusedFormControl)
		{
		return;
		}
	if(document.all)
		{
		if (focusedFormControl.createTextRange && focusedFormControl.caretPos)
			{
			var caretPos = focusedFormControl.caretPos;
			caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ?textFieldValue + ' ' : textFieldValue;
			caretPos++;
         }
		else
			{
			focusedFormControl.value = textFieldValue;
			}
		}
	else
		{
		if(focusedFormControl.setSelectionRange)
			{
			var rangeStart = focusedFormControl.selectionStart;
			var rangeEnd = focusedFormControl.selectionEnd;
			var tempStr1 = focusedFormControl.value.substring(0,rangeStart);
			var tempStr2 = focusedFormControl.value.substring(rangeEnd);
			focusedFormControl.value = tempStr1 + textFieldValue + tempStr2;
			// next line is for Safari - it's evidently ignored by Firefox
			focusedFormControl.selectionStart += 1;
			}
		else
			{
			alert("browser incompatibility problem ");
			}
		}
	focusedFormControl.focus();
	}
	
function setCookie(name,value,millis)
    {
	if (millis)
	    {
		var date = new Date();
		date.setTime(date.getTime()+millis);
		var expires = "; expires="+date.toGMTString();
	    }
	else
	    var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function getCookie(cname)
    {
	var cookies = document.cookie.split(';');
	for (var i=0;i < cookies.length;i++)
	    {
	    cookies[i] = cookies[i].replace(/^\s+/,'');
	    cookies[i] = cookies[i].replace(/\s+$/,'');
		if (cookies[i].indexOf('=') != -1)
		    {
            if (cookies[i].substr(0,cookies[i].indexOf('=')) == cname)
                {
                return(cookies[i].substr(cookies[i].indexOf('=')+1));
                }
		    }
	    }
	return null;
}	
	
function doDrag(e)
    {
    if (!e) e = window.event;
	palhand.style.background = '#ccf';
    if (dragok)
        {
        pal.style.left = dx + (e.clientX - x) + "px";
        pal.style.top = dy + (e.clientY - y) + "px";
        
        return false;
        }
    }

function mDown(e)
    {
    if (!e) e = window.event;
    dragok = true;
    x = e.clientX;
    y = e.clientY;
    coord = findPosition(pal);
    dx = coord[0];
    dy = coord[1];
    if (Math.abs(y - dy) < 5)
        {
        dy = dy - 8;
        }
    pal.onmousemove = doDrag;
    return false;
}

function findPosition( oElement ) {
  if( typeof( oElement.offsetParent ) != 'undefined' ) {
    for( var posX = 0, posY = 0; oElement; oElement = oElement.offsetParent ) {
      posX += oElement.offsetLeft;
      posY += oElement.offsetTop;
    }
    return [ posX, posY ];
  } else {
    return [ oElement.x, oElement.y ];
  }
}

function mUp()
    {
	palhand.style.background = '#ccc';
    dragok = false;
    pal.onmousemove = null;
    coord = findPosition(pal);
    setCookie('qu_loc',coord[0]+','+coord[1]);
    }

palhand = document.getElementById('palettehandle');
if (palhand)
    {
    palhand.onmousedown = mDown;
    palhand.onmouseup = mUp;
    }
pal = document.getElementById('characterpalette');
	
if (getCookie('qu_loc') != null)
    {
    panel_pos = getCookie('qu_loc').split(',');
    pal.style.left = panel_pos[0]+"px";
    pal.style.top = panel_pos[1]+"px";
    }
</script>
