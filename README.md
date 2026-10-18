# MODULE Custom Tags ckc

This module adds _WIKITREE to the sidebar allowing the user to directly reference a WikiTree.com entry.
With the Vestas tagging system you can then add a direct link to the name
- Regex: /\n1 _WIKITREE (.*)/
- HTML snippet: &lt;span class="ckc-wikitree-snippet"&gt;
                &lt;a href="https://www.wikitree.com/wiki/ &lt;ref/&gt;"&gt; 
                &lt;img width=16 src="https://stammbaum.familiekube.com/public/logo_WIKITREE_16x16.png" /&gt;&lt;/a&gt;
                &lt;/span&gt;
