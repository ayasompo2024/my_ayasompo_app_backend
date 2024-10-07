import { endpoints } from "../constants";
import { formDataRequest } from "../helpers/axios";

export const notificationService = {

    send: async (payload) => {
        const result = await formDataRequest(endpoints.notification, payload);
        return result;
    }
}