import{r as i}from"./app-Bggvsate.js";function c(s=1.5){const e=i(!1),r=i("");return{isFileTooLarge:e,errorMessage:r,checkFileSize:t=>{const l=s*1024*1024;return t.size>l?(e.value=!0,r.value=`File size exceeds ${s} MB limit.`,!1):(e.value=!1,r.value="",!0)}}}export{c as u};
