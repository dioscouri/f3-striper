<?php
// This Class contains all the webhook methods, You would add this listener to your project and write the code for each event that you need. 


namespace Example\Site;

class Listener extends \Prefab {
	
	/*
	 * describes an account Occurs whenever an account status or property has changed.
	 */
	public function onStriperWebhookAccountUpdated($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * account.application.deauthorized describes an application Occurs whenever a user deauthorizes an application. Sent to the related application only. a
	 */
	public function onStriperWebhookAccountApplicationDeauthorized($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * application_fee.created describes an application fee Occurs whenever an application fee is created on a charge.
	 */
	public function onStriperWebhookApplication_feeCreated($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * application_fee.refunded describes an application fee Occurs whenever an application fee is refunded, whether from refunding a charge or from refunding the application fee directly, including partial refunds.
	 */
	public function onStriperWebhookApplication_feeRefunded($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * balance.available describes a balance Occurs whenever your Stripe balance has been updated (e.g. when a charge collected is available to be paid out). By default, Stripe will automatically transfer any funds in your balance to your bank account on a daily basis.
	 */
	public function onStriperWebhookBalanceAvailable($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	
	/*
	 * charge.succeeded describes a charge Occurs whenever a new charge is created and is successful.
	 */
	public function onStriperWebhookChargeSucceeded($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * charge.failed describes a charge Occurs whenever a failed charge attempt occurs.
	 */
	public function onStriperWebhookChargeFailed($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * charge.refunded describes a charge Occurs whenever a charge is refunded, including partial refunds.
	 */
	public function onStriperWebhookChargeRefunded($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * charge.captured describes a charge Occurs whenever a previously uncaptured charge is captured.
	 */
	public function onStriperWebhookChargeCaptured($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * charge.updated describes a charge Occurs whenever a charge description or metadata is updated.
	 */
	public function onStriperWebhookChargeUpdated($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * charge.dispute.created describes a dispute Occurs whenever a customer disputes a charge with their bank (chargeback).
	 */
	public function onStriperWebhookChargeDisputeCreated($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * charge.dispute.updated describes a dispute Occurs when the dispute is updated (usually with evidence).
	 */
	public function onStriperWebhookChargeDisputeUpdated($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * charge.dispute.closed describes a dispute Occurs when the dispute is resolved and the dispute status changes to won or lost.
	 */
	public function onStriperWebhookChargeDisputeClosed($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * customer.created describes a customer Occurs whenever a new customer is created.
	 */
	public function onStriperWebhookCustomerCreated($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * customer.updated describes a customer Occurs whenever any property of a customer changes.
	 */
	public function onStriperWebhookCustomerUpdated($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * customer.deleted describes a customer Occurs whenever a customer is deleted.
	 */
	public function onStriperWebhookCustomerDeleted($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	
	/*
	 * customer.card.created describes a card Occurs whenever a new card is created for the customer.
	 */
	public function onStriperWebhookCustomerCardCreated($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * customer.card.updated describes a card Occurs whenever a card's details are changed.
	 */
	public function onStriperWebhookCustomerCardUpdated($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	
	/*
	 * customer.card.deleted describes a card Occurs whenever a card is removed from a customer.
	 */
	public function onStriperWebhookCustomerCardDeleted($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * customer.subscription.created describes a subscription Occurs whenever a customer with no subscription is signed up for a plan.
	 */
	public function onStriperWebhookCustomerSubscriptionCreated($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	
	/*
	 * customer.subscription.updated describes a subscription Occurs whenever a subscription changes. Examples would include switching from one plan to another, or switching status from trial to active.
	 */
	public function onStriperWebhookCustomerSubscriptionUpdated($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * customer.subscription.deleted describes a subscription Occurs whenever a customer ends their subscription.
	 */
	public function onStriperWebhookCustomerSubscriptionDeleted($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * customer.subscription.trial_will_end describes a subscription Occurs three days before the trial period of a subscription is scheduled to end.
	 */
	public function onStriperWebhookCustomerSubscriptionTrial_will_end($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * customer.discount.created describes a discount Occurs whenever a coupon is attached to a customer. customer.discount.updated describes a discount Occurs whenever a customer is switched from one coupon to another.
	 */
	public function onStriperWebhookCustomerDiscountCreated($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	
	/*
	 * customer.discount.deleted describes a discount Occurs whenever a customer's discount is removed.
	 */
	public function onStriperWebhookCustomerDiscountDeleted($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * invoice.created describes an invoice Occurs whenever a new invoice is created. If you are using webhooks, Stripe will wait one hour after they have all succeeded to attempt to pay the invoice; the only exception here is on the first invoice, which gets created and paid immediately when you subscribe a customer to a plan. If your webhooks do not all respond successfully, Stripe will continue retrying the webhooks every hour and will not attempt to pay the invoice. After 3 days, Stripe will attempt to pay the invoice regardless of whether or not your webhooks have succeeded. See how to respond to a webhook.
	 */
	public function onStriperWebhookInvoiceCreated($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * invoice.updated describes an invoice Occurs whenever an invoice changes (for example, the amount could change).
	 */
	public function onStriperWebhookInvoiceUpdated($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * invoice.payment_succeeded describes an invoice Occurs whenever an invoice attempts to be paid, and the payment succeeds.
	 */
	public function onStriperWebhookInvoicePayment_succeeded($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * invoice.payment_failed describes an invoice Occurs whenever an invoice attempts to be paid, and the payment fails. This can occur either due to a declined payment, or because the customer has no active card. A particular case of note is that if a customer with no active card reaches the end of its free trial, an invoice.payment_failed notification will occur.
	 */
	public function onStriperWebhookInvoicePayment_failed($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	
	/*
	 * invoiceitem.created describes an invoice item Occurs whenever an invoice item is created.
	 */
	public function onStriperWebhookInvoiceitemCreated($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * invoiceitem.updated describes an invoice item Occurs whenever an invoice item is updated.
	 */
	public function onStriperWebhookInvoiceitemUpdated($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * invoiceitem.deleted describes an invoice item Occurs whenever an invoice item is deleted.
	 */
	public function onStriperWebhookInvoiceitemDeleted($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * plan.created describes a plan Occurs whenever a plan is created.
	 */
	public function onStriperWebhookPlanCreated($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * plan.updated describes a plan Occurs whenever a plan is updated.
	 */
	public function onStriperWebhookPlanUpdated($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * plan.deleted describes a plan Occurs whenever a plan is deleted.
	 */
	public function onStriperWebhookPlanDeleted($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * coupon.created describes a coupon Occurs whenever a coupon is created.
	 */
	public function onStriperWebhookCouponCreated($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * coupon.deleted describes a coupon Occurs whenever a coupon is deleted.
	 */
	public function onStriperWebhookCouponDeleted($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * coupon.deleted describes a coupon Occurs whenever a coupon is deleted.
	 */
	public function onStriperWebhookCouponDeleted($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * transfer.created describes a transfer Occurs whenever a new transfer is created.
	 */
	public function onStriperWebhookTransferCreated($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * transfer.updated describes a transfer Occurs whenever the description or metadata of a transfer is updated.
	 */
	public function onStriperWebhookTransferUpdated($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * transfer.paid describes a transfer Occurs whenever a sent transfer is expected to be available in the destination bank account. If the transfer failed, a transfer.failed webhook will additionally be sent at a later time.
	 */
	public function onStriperWebhookTransferPaid($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
	/*
	 * transfer.failed describes a transfer Occurs whenever Stripe attempts to send a transfer and that transfer fails.
	 */
	public function onStriperWebhookTransferFailed($event) {
		$stripeEvent = $event->getArgument ( 'event' );
	}
}