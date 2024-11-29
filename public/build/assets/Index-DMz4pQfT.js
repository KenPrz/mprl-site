import{T as _,r as h,o as x,d as g,e as y,f as s,u as r,Z as b,j as d,g as t,v,x as w,l as I,p as k,i as S,F as B}from"./app-Bggvsate.js";import{_ as Q}from"./AuthenticatedLayout-Dw-NYtN5.js";import{_ as T}from"./Pagination-D7IZsKha.js";import P from"./ProductTable-CC7aYFe6.js";import{_ as j}from"./_plugin-vue_export-helper-DlAUqK2U.js";import"./ApplicationLogo-CGKtPefA.js";import"./Dropdown-Zr03yGGL.js";import"./Modal-BcHlt9L-.js";const u=e=>(k("data-v-e398a4db"),e=e(),S(),e),N=u(()=>t("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"},"Products",-1)),V={class:"py-12"},F={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},M={class:"bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col"},R={class:"p-2 flex justify-between px-5 items-center py-5"},$=u(()=>t("span",null,"New Product",-1)),q=u(()=>t("i",{class:"pi pi-plus-circle"},null,-1)),A={class:"py-3"},C={__name:"Index",props:{products:{type:Object,required:!0},searchQuery:{type:String,default:""}},setup(e){const c=_({searchQuery:e.searchQuery}),l=h(null);function i(n,a){let o;return function(...f){clearTimeout(o),o=setTimeout(()=>n.apply(this,f),a)}}const p=i(()=>{c.get(route("admin.products.index"))},600),m=()=>{p()};return x(()=>{l.value&&l.value.focus()}),(n,a)=>(g(),y(B,null,[s(r(b),{title:"Admin: Product"}),s(Q,null,{header:d(()=>[N]),default:d(()=>[t("div",V,[t("div",F,[t("div",M,[t("section",R,[v(t("input",{"onUpdate:modelValue":a[0]||(a[0]=o=>r(c).searchQuery=o),ref_key:"searchBarRef",ref:l,type:"text",placeholder:"Search...",id:"searchbar",class:"w-1/4 p-2",onInput:m},null,544),[[w,r(c).searchQuery]]),s(r(I),{class:"flex space-x-1 items-center bg-main-400 px-3 py-2 rounded-md text-white hover:bg-main-500",href:n.route("admin.products.create")},{default:d(()=>[$,q]),_:1},8,["href"])]),t("section",null,[s(P,{products:e.products.data},null,8,["products"])]),t("section",A,[s(T,{first_page_url:e.products.first_page_url,from:e.products.from,last_page:e.products.last_page,last_page_url:e.products.last_page_url,links:e.products.links},null,8,["first_page_url","from","last_page","last_page_url","links"])])])])])]),_:1})],64))}},K=j(C,[["__scopeId","data-v-e398a4db"]]);export{K as default};
