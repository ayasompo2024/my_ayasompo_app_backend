import { useCallback, useEffect, useRef, useState } from "react"
import { Button } from "primereact/button";
import { ConfirmDialog, confirmDialog } from 'primereact/confirmdialog';
import { Toast } from 'primereact/toast';
import { customerServices } from "../services/customerServices";
import { rejectToast } from "../constants";
import { CustomerResetPasswordTable } from "./CustomerResetPasswordTable"

export const CustomerResetPassword = ({ dataSource }) => {
    const [loading, setLoading] = useState(false);
    const [customer, setCustomer] = useState(null);

    const toast = useRef(null);

    const requestResetPassowrd = async () => {
        setLoading(true);
        const result = await customerServices.resetPassword({
            customer_id: customer ? customer.id : null
        });

        if (result.status === 200 || result.status === 201) {
            toast.current.show({ severity: 'success', summary: 'Confirmed', detail: "Customer app password is successfully reset", life: 3000 });
        }
        setLoading(false);
    }

    const confirmDialogHandler = async () => {
        return confirmDialog({
            message: 'Do you want to reset the password?',
            header: 'Password Reset Confirmation',
            icon: 'pi pi-info-circle',
            position: "bottom-right",
            acceptClassName: "p-button-danger",
            accept: async () => {
                await requestResetPassowrd();
            },
            reject: async () => {
                rejectToast(toast);
            }
        });
    }

    const mount = useCallback(async () => {
        if (dataSource) {
            setCustomer(dataSource);
        }
    }, [dataSource]);


    useEffect(() => {
        mount();
    }, [mount]);

    return (
        <div className="row">
            {customer && (
                <>
                    <div className="col-12">
                        <p>
                            Customer application password will automatically generate from system. After password is generated, need
                            to send SMS by manually at reset password table.
                        </p>
                        <Button
                            size="small"
                            severity="danger"
                            label="Reset Password"
                            className="p-button-danger"
                            icon="pi pi-reset"
                            style={{borderRadius: "5px"}}
                            loading={loading}
                            onClick={() => confirmDialogHandler()}
                        />
                    </div>

                    <div className="col-12 mt-3">
                        <CustomerResetPasswordTable customerId={customer.id} />
                    </div>

                    <Toast ref={toast} />
                    <ConfirmDialog />
                </>
            )}
        </div>
    )
}