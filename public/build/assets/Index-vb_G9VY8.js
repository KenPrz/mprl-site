import{T as _,r as h,o as x,d as g,e as y,f as t,u as r,Z as q,j as c,g as s,v,x as b,l as w,p as I,i as Q,F as k}from"./app-Bggvsate.js";import{_ as S}from"./AuthenticatedLayout-Dw-NYtN5.js";import{_ as A}from"./Pagination-D7IZsKha.js";import B from"./FaqsTable-_OyKAt9H.js";import{_ as F}from"./_plugin-vue_export-helper-DlAUqK2U.js";import"./ApplicationLogo-CGKtPefA.js";import"./Dropdown-Zr03yGGL.js";import"./Modal-BcHlt9L-.js";const u=e=>(I("data-v-8385c17f"),e=e(),Q(),e),T=u(()=>s("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"},"Frequently Ask Questions",-1)),j={class:"py-12"},V={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},M={class:"bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col"},N={class:"p-2 flex justify-between px-5 items-center py-5"},R=u(()=>s("i",{class:"pi pi-plus-circle"},null,-1)),$=u(()=>s("span",null,"Add Q&A",-1)),C={class:"py-3"},D={__name:"Index",props:{faqs:{type:Object,required:!0},searchQuery:{type:String,default:""}},setup(e){const l=_({searchQuery:e.searchQuery}),n=h(null);function d(i,a){let o;return function(...m){clearTimeout(o),o=setTimeout(()=>i.apply(this,m),a)}}const f=d(()=>{l.get(route("admin.faqs.index"))},600),p=()=>{f()};return x(()=>{n.value&&n.value.focus()}),(i,a)=>(g(),y(k,null,[t(r(q),{title:"Admin: FAQs"}),t(S,null,{header:c(()=>[T]),default:c(()=>[s("div",j,[s("div",V,[s("div",M,[s("section",N,[v(s("input",{"onUpdate:modelValue":a[0]||(a[0]=o=>r(l).searchQuery=o),ref_key:"searchBarRef",ref:n,type:"text",placeholder:"Search...",id:"searchbar",class:"w-1/4 p-2",onInput:p},null,544),[[b,r(l).searchQuery]]),t(r(w),{class:"flex space-x-1 items-center bg-main-400 px-3 py-2 rounded-md text-white hover:bg-main-500",href:i.route("admin.faqs.create")},{default:c(()=>[R,$]),_:1},8,["href"])]),s("section",null,[t(B,{faqs:e.faqs.data},null,8,["faqs"])]),s("section",C,[t(A,{first_page_url:e.faqs.first_page_url,from:e.faqs.from,last_page:e.faqs.last_page,last_page_url:e.faqs.last_page_url,links:e.faqs.links},null,8,["first_page_url","from","last_page","last_page_url","links"])])])])])]),_:1})],64))}},L=F(D,[["__scopeId","data-v-8385c17f"]]);export{L as default};
