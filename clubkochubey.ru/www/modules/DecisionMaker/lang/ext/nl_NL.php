<?php
$lang['changelog'] = 'Wijziginglog';
$lang['display_type'] = 'Toon onderliggende keuzes als';
$lang['dropdown'] = 'Dropdown ';
$lang['error_badoptions'] = 'E&eacute;n of meer, door u gekozen opties zijn niet correct.';
$lang['error_invalid_parent'] = 'Deze inhoudstype parent moet een Besluiten Lijst Node zijn';
$lang['error_nooptions'] = 'U heeft geen opties benoemd';
$lang['error_noselection'] = 'Selecteer &eacute;&eacute;n van de beschikbare opties';
$lang['form_template'] = 'Formulier Sjabloon';
$lang['formhandler_template'] = 'Formulier Afhandeling';
$lang['friendlyname'] = 'Calguy&#039;s DecisionMaker';
$lang['friendlyname_decisionlist'] = 'Besluiten Lijst';
$lang['friendlyname_decisionnode'] = 'Besluiten Lijst Node';
$lang['friendlyname_decisiontree'] = 'Beslissingenboom';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>This module provides some new content types to CMS Made Simple to allow creating, displaying, and interacting with quizes and surveys, to aide in diagnosis, evaluation, or decision making. This module allows you to build simple quizzes, or problem solving tools into your CMS Made Simple Website.  Smarty plugins provide the mechanism for keeping track of scores, or the answers to questions, and completely controls the output.</p>
<h3>Features</h3>
<ul>
<li>The DecisionTree content type automatically creates questions from its children, and navigates to the child that was selected in order to further the decision making process.  This is suitable for creating a decision making or diagnostic quiz.</li>
<li>The DecisionList content type allows creating a flat list of questions that are asked in a sequence, suitable for quizes etc.</li>
</ul>
<h3>Question Types</h3>
<p>A Decision Tree can only be used to creeate multiple-choice type questions. The DecisionList Node currently also only supports multiple choice questions, though that may change in the future.</p>
<h3>How do I use it</h3>
<p>This module is used by creating a series of content pages of the appropriate types to form a quiz or a decision tree.  And then modifying the smarty templates associated which each page to control the layout of the question and the handling of the output.</p>
<h5>Decision Trees</h5>
<p>Decision trees are typically used to aide in decision making, or in diagnosing a problem.  The questions are taken from the menu text of the children.  If a &amp;quot;Decision Tree&amp;quot; page has children, then its question is displayed, and the options are taken from the children.  If the page does not have children, then its page content is displayed, allowing displaying a final answer.</p>

<ul>
   <li>Title:  Dinner Choices<br/>
       Menu Text: Dinner Choices<br/>
       Question: What would you like to eat for dinner
       <ul>
       <li>Title:  Chinese Food<br/>
           Menu Text: Chinese Food<br/>
           Question: Eat in, or Take out
           <ul>
	   <li>Title: Eat in<br/>
   	       Menu Text: Eat in<br/>
               Content: The Far East Inn has a great atmosphere, great service, never a line up, and reasonable prices... the food is fantastic.<br/><br/>
           </li>
	   <li>Title: Take Out<br/>
   	       Menu Text: Take Out<br/>
               Content: The food at the lemon tree is incredible... for a reasonable price...delivery is quick and the food is always hot.
           </li>
           </ul>
       <li>Title:  Italian<br/>
           Menu Text: Italian Cuisine<br/>
           Content: There is only one true place for good italian food in this city.  Call 555-1234 and ask for &amp;quot;Antony&amp;quot; to get a reservation.
       </li>
       </ul>
   </li>
</ul>

<br/>
<h5>Decision Lists</h5>
<p>Decision lists are typically used to ask a series of questions.  The answers for all of these questions are then typically analyzed and resulting information displayed on a result page.</p>
<p>The Decision list functionality uses smarty tags to store the results of each question into session variables.  A content page at the end of the series of questions is used to analyze the session variables to display a result.</p>
<p>To create a proper decision list, create a content page of type &amp;quot;Decision List&amp;quot;, and then a series of &amp;quot;Decision List Node&amp;quot; pages as direct children of that page.  These &amp;quot;nodes&amp;quot; form the questions.  A regular content page will be used to display the results.  The Decision List  content type is a simple content type without much functionality.  It basically serves as just a container for the varouis questions <em>(or nodes)</em>.   The Decision List Node content type asks for a question, the options for that question, and provides for the ability to customize the form template, and allows (using smarty) to specify form handling.</p>
<p>For an example of this, we will do a simple mathematics test, and display the results.  Create a page hierarchy such as this:</p>

<ul>
   <li>Content Type: Decision List<br/>
       Title: Math Quiz<br/>
       Menu Text: Math Quiz<br/>
       Content: {* this content is ignored *}<br/><br/>
       
       <ul>
         <li>
            Content Type: Decision List Node<br/>
            Title: Question 1<br/>
            Menu Text: Question 1<br/>
            Question: What is the square root of 9<br/>
            Options:
<pre>
1
3
10
5
</pre>
            Form Handling Function:<br/>
<code>
{decisionmaker_reset}
{if $answer == 3}
  {* the correct answer for this question is 3 *}
  {decisionmaker_add var=&#039;score&#039; val=1}
{/if}
</code><br/><br/>
         </li>

         <li>
            Content Type: Decision List Node<br/>
            Title: Question 2<br/>
            Menu Text: Question 2<br/>
            Question: What is mean value of these numbers: <br/>
            Options:
<pre>
6
8
10
15
20
30
</pre>
            Form Handling Function:<br/>
<code>
{if $answer == 8}
  {* the correct answer for this question is 8 *}
  {decisionmaker_add var=&#039;score&#039; val=1}
{/if}
</code><br/><br/>
         </li>

         <li>
            Content Type: Decision List Node<br/>
            Title: Question 3<br/>
            Menu Text: Question 3<br/>
            Question: What is the median value of these values: 9 11 3 7 5<br/>
            Options:
<pre>
5
6
7
8
9
11
12
</pre>
            Form Handling Function:<br/>
<code>
{if $answer == 9}
  {* the correct answer for this question is 9 *}
  {decisionmaker_add var=&#039;score&#039; val=1}
{/if}
</code><br/><br/>
         </li>

         <li>
            Content Type: Content Page<br/>
            Title: Results<br/>
            Menu Text: Results<br/>
            Contents:<br/>

<code>
{decisionmaker_get var=&#039;score&#039; assign=&#039;score&#039;}
&amp;lt;p&amp;gt;You got {$score} out of 3 questions correct.&amp;lt;/p&amp;gt;
&amp;lt;p&amp;gt;Your score was {$score/3|number_format:2} percent correct.&amp;lt;/p&amp;gt;
</code>
         </li>
       </ul>
   </li>
</ul>
<p>It is hoped that with these simple examples you can see how to create simple quizzes, and decision making processes.</p>
<h3>Smarty Variables in the Form Handler</h3>
<p>The Decison List Node content type exports two smarty variables in the form handler template:</p>
<ul>
<li>{$question} - the name of the question.  At this time it is synonymous with the current page alias.  Though this may change in the future.</li>
<li>{$answer} - The value of the question answered.</li>
</ul>

<h3>Smarty Functions</h3>
<p>The DecisionMaker module makes available a number of smarty plugins to aide in building quizzes:</p>
<ul>
  <li><strong>{decisionmaker_set var=&#039;varname&#039; val=&#039;value&#039;}</strong>
  <p>This plugin sets a variable into the users session with the specified name and value. Typically it is used for storing the answer to the question.<br/>i.e: <code>{decisionmaker_set var=$question val=$answer}</code></p>
  </li>

  <li><strong>{decisionmaker_add var=&#039;varname&#039; val=&#039;value&#039;}</strong>
  <p>This plugin either creates a new variable in the users session, or adds the value to an existing variable. Typically it is used for building a score in a quiz<br/>i.e: <code>{decisionmaker_add var=&quot;score&quot; val=$answer}</code></p>
  </li>

  <li><strong>{decisionmaker_get var=&#039;varname&#039; [assign=&#039;varname&#039;}</strong>
<p>This plugin returns the value of a decision maker variable stored in the user session. If the optional assign parameter is supplied, the output of the function will be given to the smarty variable with the name supplied.<br/>i.e: <code>{decisionmaker_get var=&quot;score&quot; assign=&#039;score&#039;}</code></p>
  </li>

  <li><strong>{decisionmaker_list [assign=&#039;varname&#039;}</strong>
<p>This plugin returns all of the values of a decision maker variables stored in the user session. If the optional assign parameter is supplied, the output of the function will be given to the smarty variable with the name supplied.<br/>i.e: <code>{decisionmaker_list assign=&#039;score&#039;}</code></p>
  </li>

  <li><strong>{decisionmaker_reset [assign=&#039;varname&#039;}</strong>
<p>This plugin resets all of the values of a decision maker variables stored in the user session.<br/>i.e: <code>{decisionmaker_reset}</code></p>
  </li>

</ul>

<h3>Support</h3>
<p>This module does not include commercial support. However, there are a number of resources available to help you with it:</p>
<ul>
<li>For the latest version of this module, FAQs, or to file a Bug Report or buy commercial support, please visit calguy\&#039;s
module homepage at <a href="http://techcom.dyndns.org">techcom.dyndns.org</a>.</li>
<li>Additional discussion of this module may also be found in the <a href="http://forum.cmsmadesimple.org">CMS Made Simple Forums</a>.</li>
<li>The author, calguy1000, can often be found in the <a href="irc://irc.freenode.net/#cms">CMS IRC Channel</a>.</li>
<li>Lastly, you may have some success emailing the author directly.</li>  
</ul>
<h3>Copyright and License</h3>
<p>Copyright &amp;copy; 2008, Robert Campbel <a href="mailto:calguy1000@cmsmadesimple.org">&amp;lt;calguy1000@cmsmadesimple.org&amp;gt;</a>. All Rights Are Reserved.</p>
<p>This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.</p>
<p>However, as a special exception to the GPL, this software is distributed
as an addon module to CMS Made Simple.  You may not use this software
in any Non GPL version of CMS Made simple, or in any version of CMS
Made simple that does not indicate clearly and obviously in its admin 
section that the site was built with CMS Made simple.</p>
<p>This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
Or read it <a href="http://www.gnu.org/licenses/licenses.html#GPL">online</a></p>
TODO';
$lang['info_formhandler'] = 'Smarty sjabloon om de resultaten van het formulier te bewerken. U kunt verschillende smarty plugins en logica gebruiken om, hoe de pagina afhankelijk van de ingevoerde data door de gebruiker moet handelen';
$lang['info_options'] = 'Benoem de te tonen opties. E&eacute;n optie per regel. Tekst en waarde kunnen worden gescheiden door een &quot;pijp&quot; | Bijv. Vrouw|v';
$lang['info_sysdefault_template'] = 'Dit is een standaard systeem sjabloon. Het wijzigen van deze sjabloon heeft alleen effect op nieuwe DecisionTree pagina&#039;s';
$lang['info_question'] = 'Benoem de tekst van de vraag die wordt gesteld';
$lang['moddescription'] = 'Benoem een mechanisme voor een beslissingsboom';
$lang['next'] = 'Volgende';
$lang['postinstall'] = 'De DecisionMaker module is ge&iuml;nstalleerd';
$lang['postuninstall'] = 'De DecisionMaker module is gede&iuml;nstalleerd';
$lang['prev'] = 'Terug';
$lang['prompt_formhandler'] = 'Op Smarty gebaseerde formulier afhandelingsfunctie';
$lang['prompt_options'] = 'Opties';
$lang['prompt_question'] = 'Vraag';
$lang['radiogroup'] = 'Radio Knoppen';
$lang['really_uninstall'] = 'Weet u zeker dat u dit wilt doen? Deze module exporteerd content types.  Als u pagina&#039;s heeft die deze types gebruikt, kan de&iuml;nstalleren het functioneren van uw website be&iuml;nvloeden...';
$lang['select_one'] = 'Kies &eacute;&eacute;n';
$lang['title_sysdefault_form_template'] = 'System standaard formulier sjabloon';
$lang['title_sysdefault_formhandler_template'] = 'System standaard formulier afhandeling';
$lang['utma'] = '156861353.1764090269059867100.1239886062.1250004307.1250102177.49';
$lang['utmz'] = '156861353.1250004307.48.10.utmcsr=obszeijen.nl|utmccn=(referral)|utmcmd=referral|utmcct=/over-de-website.html';
$lang['qca'] = '4824ac14-af799-a4257-f4cde';
$lang['utmb'] = '156861353.4.10.1250102177';
$lang['utmc'] = '156861353';
$lang['qcb'] = '233765889';
?>