<?php
$lang['changelog'] = 'Changelog';
$lang['display_type'] = 'Display child choices as';
$lang['dropdown'] = 'Menu d&eacute;roulant';
$lang['error_badoptions'] = 'One or more of the options you specified is invalid.';
$lang['error_invalid_parent'] = 'This content types parent must be a Decision Tree Node';
$lang['error_nooptions'] = 'Vous n&#039;avez pas sp&eacute;cifi&eacute; d&#039;options';
$lang['error_noselection'] = 'Choisissez une des options ci-dessous';
$lang['form_template'] = 'Form Template';
$lang['formhandler_template'] = 'Form Handler';
$lang['friendlyname'] = 'Calguys DecisionMaker';
$lang['friendlyname_decisionlist'] = 'Liste de d&eacute;cisions';
$lang['friendlyname_decisionnode'] = 'Node de liste de d&eacute;cisions';
$lang['friendlyname_decisiontree'] = 'Arborescence de d&eacute;cision';
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
<p>Decision trees are typically used to aide in decision making, or in diagnosing a problem.  The questions are taken from the menu text of the children.  If a &quot;Decision Tree&quot; page has children, then its question is displayed, and the options are taken from the children.  If the page does not have children, then its page content is displayed, allowing displaying a final answer.</p>

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
           Content: There is only one true place for good italian food in this city.  Call 555-1234 and ask for &quot;Antony&quot; to get a reservation.
       </li>
       </ul>
   </li>
</ul>

<br/>
<h5>Decision Lists</h5>
<p>Decision lists are typically used to ask a series of questions.  The answers for all of these questions are then typically analyzed and resulting information displayed on a result page.</p>
<p>The Decision list functionality uses smarty tags to store the results of each question into session variables.  A content page at the end of the series of questions is used to analyze the session variables to display a result.</p>
<p>To create a proper decision list, create a content page of type &quot;Decision List&quot;, and then a series of &quot;Decision List Node&quot; pages as direct children of that page.  These &quot;nodes&quot; form the questions.  A regular content page will be used to display the results.  The Decision List  content type is a simple content type without much functionality.  It basically serves as just a container for the varouis questions <em>(or nodes)</em>.   The Decision List Node content type asks for a question, the options for that question, and provides for the ability to customize the form template, and allows (using smarty) to specify form handling.</p>
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
<p>You got {$score} out of 3 questions correct.</p>
<p>Your score was {$score/3|number_format:2} percent correct.</p>
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
<p>Copyright &copy; 2008, Robert Campbel <a href="mailto:calguy1000@cmsmadesimple.org"><calguy1000@cmsmadesimple.org></a>. All Rights Are Reserved.</p>
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
$lang['info_formhandler'] = 'Smarty template to handle results from this form.  You can use various smarty plugins and logic to dictate how to store, and flow from this page depending upon the user supplied answer';
$lang['info_options'] = 'Specify the options to display.  One option per line.  Prompts and values can be seperated by a &quot;pipe&quot; | i.e Female|f';
$lang['info_sysdefault_template'] = 'This is a system default template.  Editing this template will only effect new DecisionTree pages';
$lang['info_question'] = 'Specify the text of the question to ask';
$lang['moddescription'] = 'Provide a mechanism for a decision making tree';
$lang['next'] = 'Suivant';
$lang['postinstall'] = 'Le module DecisionMaker a bien &eacute;t&eacute; install&eacute;';
$lang['postuninstall'] = 'Le module DecisionManer a bien &eacute;t&eacute; d&eacute;sinstall&eacute;';
$lang['prev'] = 'Retour';
$lang['prompt_formhandler'] = 'Smarty based form handling function';
$lang['prompt_options'] = 'Options ';
$lang['prompt_question'] = 'Question ';
$lang['radiogroup'] = 'Boutons radio';
$lang['really_uninstall'] = 'Are you sure you want to do this? This module exports content types.  If you have any content pages using these types uninstalling this module may result in a broken site';
$lang['select_one'] = 'Faire une s&eacute;lection';
$lang['title_sysdefault_form_template'] = 'System default form template';
$lang['title_sysdefault_formhandler_template'] = 'System Default Form Handler';
$lang['qca'] = 'P0-58741428-1276531635559';
$lang['utma'] = '156861353.1249395224.1276535615.1276535615.1276620959.2';
$lang['utmz'] = '156861353.1276620959.2.2.utmccn=(referral)|utmcsr=dev.cmsmadesimple.org|utmcct=/projects/feunotification|utmcmd=referral';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>