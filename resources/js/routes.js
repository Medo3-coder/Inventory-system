let login = require('./components/auth/login.vue').default
let register = require('./components/auth/register.vue').default
let forget = require('./components/auth/forget.vue').default
let logout = require('./components/auth/logout.vue').default

//end Authentication
let home = require('./components/home.vue').default

//Employee component
let store_employee = require('./components/employee/create.vue').default
let employee = require('./components/employee/index.vue').default
let editemployee = require('./components/employee/edit.vue').default

//Supplier component
let store_supplier = require('./components/supplier/create.vue').default
let supplier = require('./components/supplier/index.vue').default
let editsupplier = require('./components/supplier/edit.vue').default


//category component
let store_category = require('./components/category/create.vue').default
let category = require('./components/category/index.vue').default
let editcategory = require('./components/category/edit.vue').default


//product component
let store_product = require('./components/product/create.vue').default
let product = require('./components/product/index.vue').default
let editproduct = require('./components/product/edit.vue').default

//expense component
let store_expense = require('./components/expense/create.vue').default
let expense = require('./components/expense/expense.vue').default
let editexpense = require('./components/expense/edit.vue').default


//salary component
let sallary = require('./components/salary/all_employee.vue').default
let paysalary = require('./components/salary/create.vue').default
let allsalary = require('./components/salary/index.vue').default
let viewsalary = require('./components/salary/view.vue').default
let editsalary = require('./components/salary/edit.vue').default

//stock component
let stock = require('./components/product/stock.vue').default
let editstock = require('./components/product/edit-stock.vue').default


//customer component
let store_customer = require('./components/customer/create.vue').default
let customer = require('./components/customer/index.vue').default
let editcustomer = require('./components/customer/edit.vue').default




export const routes = [
    { path: '/', component: login, name: '/' },
    { path: '/register', component: register, name: 'register' },
    { path: '/forget', component: forget, name: 'forget' },
    { path: '/logout', component: logout, name: 'logout' },
    { path: '/home', component: home, name: 'home' },
    //employee routes
    { path: '/store-employee', component: store_employee, name: 'store-employee' },
    { path: '/employee', component: employee, name: 'employee' },
    { path: '/edit-employee/:id', component: editemployee, name: 'edit-employee' },

    //supplier routes
    { path: '/store-supplier', component: store_supplier, name: 'store-supplier' },
    { path: '/supplier', component: supplier, name: 'supplier' },
    { path: '/edit-supplier/:id', component: editsupplier, name: 'edit-supplier' },


    //category routes
    { path: '/store-category', component: store_category, name: 'store-category' },
    { path: '/category', component: category, name: 'category' },
    { path: '/edit-category/:id', component: editcategory, name: 'edit-category' },


    //product routes
    { path: '/store-product', component: store_product, name: 'store-product' },
    { path: '/product', component: product, name: 'product' },
    { path: '/edit-product/:id', component: editproduct, name: 'edit-product' },



    //expense routes
    { path: '/store-expense', component: store_expense, name: 'store-expense' },
    { path: '/expense', component: expense, name: 'expense' },
    { path: '/edit-expense/:id', component: editexpense, name: 'edit-expense' },

    //salary routes
    { path: '/given-salary', component: sallary, name: 'given-salary' },
    { path: '/pay-salary/:id', component: paysalary, name: 'pay-salary' },
    { path: '/salary', component: allsalary, name: 'salary' },
    { path: '/view-salary/:id', component: viewsalary, name: 'view-salary' },
    { path: '/edit-salary/:id', component: editsalary, name: 'edit-salary' },

    //stock routes
    { path: '/stock', component: stock, name: 'stock' },
    { path: '/edit-stock/:id', component: editstock, name: 'edit-stock' },


    //customer routes
    { path: '/store-customer', component: store_customer, name: 'store-customer' },
    { path: '/customer', component: customer, name: 'customer' },
    { path: '/edit-customer/:id', component: editcustomer, name: 'edit-customer' },


]