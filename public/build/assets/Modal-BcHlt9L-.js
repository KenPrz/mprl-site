import{w as v,o as f,c as w,K as h,d as p,D as x,f as l,j as n,v as c,z as i,g as e,I as r,h as b,E as _,s as g,Q as k}from"./app-Bggvsate.js";const C={class:"fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50","scroll-region":""},B=e("div",{class:"absolute inset-0 bg-black opacity-30"},null,-1),E=[B],z=e("i",{class:"pt-4 pi pi-times"},null,-1),N=[z],W={__name:"Modal",props:{show:{type:Boolean,default:!1},maxWidth:{type:String,default:"2xl"},closeable:{type:Boolean,default:!0}},emits:["close"],setup(s,{emit:m}){const t=s,u=m;v(()=>t.show,()=>{t.show?document.body.style.overflow="hidden":document.body.style.overflow=null});const a=()=>{t.closeable&&u("close")},d=o=>{o.key==="Escape"&&t.show&&a()};f(()=>document.addEventListener("keydown",d)),w(()=>{document.removeEventListener("keydown",d),document.body.style.overflow=null});const y=h(()=>({sm:"sm:max-w-sm",md:"sm:max-w-md",lg:"sm:max-w-lg",xl:"sm:max-w-xl","2xl":"sm:max-w-2xl"})[t.maxWidth]);return(o,S)=>(p(),x(k,{to:"body"},[l(r,{"leave-active-class":"duration-200"},{default:n(()=>[c(e("div",C,[l(r,{"enter-active-class":"ease-out duration-300","enter-from-class":"opacity-0","enter-to-class":"opacity-100","leave-active-class":"ease-in duration-200","leave-from-class":"opacity-100","leave-to-class":"opacity-0"},{default:n(()=>[c(e("div",{class:"fixed inset-0 transform transition-all",onClick:a},E,512),[[i,s.show]])]),_:1}),l(r,{"enter-active-class":"ease-out duration-300","enter-from-class":"opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95","enter-to-class":"opacity-100 translate-y-0 sm:scale-100","leave-active-class":"ease-in duration-200","leave-from-class":"opacity-100 translate-y-0 sm:scale-100","leave-to-class":"opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"},{default:n(()=>[c(e("div",{class:b(["relative mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto",y.value])},[e("button",{onClick:a,class:"absolute right-5"},N),s.show?_(o.$slots,"default",{key:0}):g("",!0)],2),[[i,s.show]])]),_:3})],512),[[i,s.show]])]),_:3})]))}};export{W as _};
