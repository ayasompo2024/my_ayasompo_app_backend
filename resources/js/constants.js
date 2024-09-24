export const env = 1;

export const baseURL = [
    "http://localhost:8000",
    "myayasompo.ayasompo.com"
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
    defaultImagePath: `${baseURL}/uploads/profile/user.jpg`,
    user: "user",
    imagePath: `${baseURL}/uploads/profile`,
}