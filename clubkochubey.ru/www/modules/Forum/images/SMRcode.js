SMR_confMaxDim = 120; //pixels

function SMR_resize(obj) {
   thisWidth = obj.width;
   thisHeight = obj.height;

   if(thisWidth > thisHeight) thisMaxDim = thisWidth;
   else thisMaxDim = thisHeight;

   if(thisMaxDim > SMR_confMaxDim) {
      thisMinDim = Math.round((((thisWidth > thisHeight)?thisHeight:thisWidth) * SMR_confMaxDim) / thisMaxDim);

      if(thisWidth > thisHeight) {
         thisWidth = SMR_confMaxDim;
         thisHeight = thisMinDim;
      } else {
         thisHeight = SMR_confMaxDim;
         thisWidth = thisMinDim;
      }
   } //if(thisMaxDim > SMR_confMaxDim)

   obj.height = thisHeight;
   obj.width = thisWidth;
}
function SMR_setLink(obj) {
   thisInnerHtml = obj.innerHTML;
   tmpArray = thisInnerHtml.split(' src=\"');
   tmpArray = tmpArray[1].split('"');
   obj.href = tmpArray[0];
}
