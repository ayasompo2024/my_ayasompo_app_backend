import { endpoints } from "../constants";
import { getRequest, postRequest } from "../helpers/axios";

export const customerServices = {

    resetPassword: async (payload) => {
        const result = await postRequest(endpoints.resetPassword, payload);
        return result;
    },

    resetPasswordIndex: async(id, params) => {
        const result = await getRequest(`${endpoints.resetPassword}/${id}`, params);
        return result;
    },

    sendResetPassword: async(id) => {
        const result = await postRequest(`${endpoints.resetPassword}/${id}/send-sms`, null);
        return result;
    }
}