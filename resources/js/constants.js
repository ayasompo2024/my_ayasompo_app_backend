export const env = 1;

export const baseURL = [
    "http://localhost:8000",
    "https://myayasompo.ayasompo.com"
][env];

export const prefix = [
    'api/admin/v1',
    'api/admin/v1'
][env];

export const endpoints = {
    customer: "customer",
    customerCount: "customer/count",
    customerDetail: "customer/detail",
    customerUpdate: 'customer/update',
    resetPassword: "reset-password/customer",
    defaultImagePath: `${baseURL}/uploads/profile/user.jpg`,
    user: "user",
    imagePath: `${baseURL}/uploads/profile`,
    notification: "messaging",
    gojoy: "gojoy"
}

export const messageType = [
    { name: "Multicast", code: "Multicast" },
    { name: "Unicast", code: "Unicast" },
    { name: "Broadcast", code: "Broadcast" },
];

export const notiFor = [
    { name: "Promotions", code: "Promotions" },
    { name: "Transactions", code: "Transactions" },
    { name: "System", code: "System" },
];

/** Operation Action  */
export const rejectToast = (toast) => {
    toast.current.show({ severity: 'warn', summary: 'Rejected', detail: 'You have rejected', life: 3000 });
}
