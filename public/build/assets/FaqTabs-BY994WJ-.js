import u from"./BlogContent-pOFsEsWm.js";import{d as r,e as a,g as o,F as i,m as n,J as c,x as d,f,q as h}from"./app-D7Jmbt7w.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const y={class:"flex border-b-2 justify-center text-lg gap-10"},g=["onClick"],p={class:"mt-5"},m=["onClick"],v={class:"font-bold text-lg text-blue-500"},C={key:0,class:"text-blue-600 text-sm mt-2"},_={props:{projectCategory:{type:Array,default:()=>[],required:!0},faqs:{type:Array,default:()=>[],required:!0}},data(){return{selectedCategory:null,activeFaq:null}},computed:{filteredProjects(){return this.selectedCategory===null?this.faqs:this.faqs.filter(e=>e.category_id===this.selectedCategory)}},mounted(){this.projectCategory.length>0&&(this.selectedCategory=this.projectCategory[0].id)},methods:{selectCategory(e){this.selectedCategory=e,this.activeFaq=null},toggleFaq(e){this.activeFaq=this.activeFaq===e?null:e}}},w=Object.assign(_,{__name:"FaqTabs",setup(e){return(s,b)=>(r(),a("div",null,[o("div",y,[(r(!0),a(i,null,n(e.projectCategory,t=>(r(),a("div",{key:t.id,onClick:l=>s.selectCategory(t.id),class:c(["cursor-pointer px-4 py-2",s.selectedCategory===t.id?"active-tab":"inactive-tab"])},d(t.name),11,g))),128))]),o("div",p,[(r(!0),a(i,null,n(s.filteredProjects,(t,l)=>(r(),a("div",{key:t.id,class:"overflow-hidden border-b-2 py-2"},[o("div",{onClick:q=>s.toggleFaq(l),class:"flex justify-between items-center cursor-pointer"},[o("h3",v,d(t.question),1),o("i",{class:c([s.activeFaq===l?"fa-solid fa-chevron-up":"fa-solid fa-chevron-down","text-xl"])},null,2)],8,m),s.activeFaq===l?(r(),a("div",C,[f(u,{body:t.answer},null,8,["body"])])):h("",!0)]))),128))])]))}});export{w as default};
