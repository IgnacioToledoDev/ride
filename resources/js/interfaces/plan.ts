export interface Plan {
    id: number,
    name: string,
    storageLimit: number,
    bandwidthLimit: number,
    ramLimit: number,
    isPopular: boolean,
    billingCycle: BillingCycle,
    price: number,
    features: string,
}

export enum BillingCycle {
    MONTHLY = 'monthly',
    YEARLY = 'yearly'
}
